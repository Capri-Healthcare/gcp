<?php

use DocuSign\eSign\Client\ApiException;
use DocuSign\eSign\Model\Document;
use DocuSign\eSign\Model\EnvelopeDefinition;
use DocuSign\eSign\Model\Recipients;
use DocuSign\eSign\Model\Signer;
use DocuSign\eSign\Model\SignHere;
use DocuSign\eSign\Model\Tabs;

class DocusignController extends Controller {

	/** ClientService */
    private $clientService;

    /** RouterService */
    private $routerService;

    /** Specific template arguments */
    private $args;

    private $eg = "eg001";            # reference (and url) for this example
    private $signer_client_id = 1000; # Used to indicate that the signer will use an embedded
                                      # Signing Ceremony. Represents the signer's userId within your application.

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->args = $this->getTemplateArgs();
        //print_r($this->args);exit;
        $this->clientService = new ClientService($this->args);
        //print_r($this->clientService);exit;
        $this->routerService = new RouterService();
        //print_r($this->routerService);exit;
        //parent::controller($this->eg, $this->routerService, basename(__FILE__));
        
    }

    public function index(){
        
        

        //$this->routerService->check_csrf();
        
        //$this->createController();

        echo "<a href='http://lc.capripvt.tiez.net/index.php?route=test/signWithDocuSign'>Sign the Document with DocuSign</a>";exit;
    }


    public function checkDocuSignReturn(){
        echo "Document Sign";
        echo "<pre>"; print_r($_GET);
        exit;
    }

    /**
     * 1. Check the token
     * 2. Call the worker method
     * 3. Redirect the user to the signing ceremony
     *
     * @return void
     * @throws ApiException for API problems and perhaps file access \Exception too.
     */
    public function createController(): void
    {
        //echo "createController called";exit;
        //$minimum_buffer_min = 3;
        //if ($this->routerService->ds_token_ok($minimum_buffer_min)) {
            # 1. Call the worker method
            # More data validation would be a good idea here
            # Strip anything other than characters listed
            $results = $this->worker($this->args);

            if ($results) {
                //echo "<pre>";print_r($results);exit;
                # Redirect the user to the Signing Ceremony
                # Don't use an iFrame!
                # State can be stored/recovered using the framework's session or a
                # query parameter on the returnUrl (see the make recipient_view_request method)
                header('Location: ' . $results["redirect_url"]);
                exit;
            }
        /*} else {
            echo "Error: needToReAuth";exit;
            $this->clientService->needToReAuth($this->eg);
        }*/
    }


    /**
     * Do the work of the example
     * 1. Create the envelope request object
     * 2. Send the envelope
     * 3. Create the Recipient View request object
     * 4. Obtain the recipient_view_url for the signing ceremony
     *
     * @param  $args array
     * @return array ['redirect_url']
     * @throws ApiException for API problems and perhaps file access \Exception too.
     */
    # ***DS.snippet.0.start
    public function worker(array $args): array
    {
        //echo "Create the envelope request object";exit;
        # 1. Create the envelope request object
        $envelope_definition = $this->make_envelope($args["envelope_args"]);
        $envelope_api = $this->clientService->getEnvelopeApi();

        # 2. call Envelopes::create API method
        # Exceptions will be caught by the calling function
        try {
            $results = $envelope_api->createEnvelope($args['account_id'], $envelope_definition);
        } catch (ApiException $e) {
            $this->clientService->showErrorTemplate($e);
            exit;
        }
        $envelope_id = $results->getEnvelopeId();

        # 3. Create the Recipient View request object
        $authentication_method = 'None'; # How is this application authenticating
        # the signer? See the `authentication_method' definition
        # https://developers.docusign.com/esign-rest-api/reference/Envelopes/EnvelopeViews/createRecipient
        $recipient_view_request = $this->clientService->getRecipientViewRequest(
            $authentication_method,
            $args["envelope_args"]
        );

        # 4. Obtain the recipient_view_url for the signing ceremony
        # Exceptions will be caught by the calling function
        $results = $this->clientService->getRecipientView($args['account_id'], $envelope_id, $recipient_view_request);
        return ['envelope_id' => $envelope_id, 'redirect_url' => $results['url']];
    }

    /**
     *  Creates envelope definition
     *  Parameters for the envelope: signer_email, signer_name, signer_client_id
     *
     * @param  $args array
     * @return EnvelopeDefinition -- returns an envelope definition
     */
    private function make_envelope(array $args): EnvelopeDefinition
    {
        # document 1 (pdf) has tag /sn1/
        #
        # The envelope has one recipient.
        # recipient 1 - signer
        #
        # Read the file
        $doc_folder = ENV_APPLICATION_DIR . 'public/uploads/appointment/';
        echo "Read the file: " . $doc_folder . $GLOBALS['DS_CONFIG']['doc_pdf'];
        $content_bytes = file_get_contents($doc_folder . $GLOBALS['DS_CONFIG']['doc_pdf']);
        $base64_file_content = base64_encode($content_bytes);

        # Create the document model
        $document = new Document([ # create the DocuSign document object
            'document_base64' => $base64_file_content,
            'name' => 'Example document', # can be different from actual file name
            'file_extension' => 'pdf', # many different document types are accepted
            'document_id' => 1 # a label used to reference the doc
        ]);

        # Create the signer recipient model
        $signer = new Signer([ # The signer
            'email' => $args['signer_email'], 'name' => $args['signer_name'],
            'recipient_id' => "1", 'routing_order' => "1",
            # Setting the client_user_id marks the signer as embedded
            'client_user_id' => $args['signer_client_id']
        ]);

        # Create a sign_here tab (field on the document)
        $sign_here = new SignHere([ # DocuSign SignHere field/tab
            'anchor_string' => '/sn1/', 'anchor_units' => 'pixels',
            'anchor_y_offset' => '10', 'anchor_x_offset' => '20'
        ]);

        # Add the tabs model (including the sign_here tab) to the signer
        # The Tabs object wants arrays of the different field/tab types
        $signer->settabs(new Tabs(['sign_here_tabs' => [$sign_here]]));

        # Next, create the top level envelope definition and populate it.
        $envelope_definition = new EnvelopeDefinition([
            'email_subject' => "Please sign this document sent from the PHP SDK",
            'documents' => [$document],
            # The Recipients object wants arrays for each recipient type
            'recipients' => new Recipients(['signers' => [$signer]]),
            'status' => "sent" # requests that the envelope be created and sent.
        ]);

        return $envelope_definition;
    }
    # ***DS.snippet.0.end

    

    /**
     * Get specific template arguments
     *
     * @return array
     */
    private function getTemplateArgs(): array
    {
        //$signer_name = preg_replace('/([^\w \-\@\.\,])+/', '', $_POST['signer_name']);
        //$signer_email = preg_replace('/([^\w \-\@\.\,])+/', '', $_POST['signer_email']);
        $signer_name = "Chetan Thumar";
        $signer_email = "chetan.thumar@tiez.nl";

        //$signer_name = "Hardeep Pandya";
        //$signer_email = "hardeep.pandya@tiez.nl";
        
        $envelope_args = [
            'signer_email' => $signer_email,
            'signer_name' => $signer_name,
            'signer_client_id' => $this->signer_client_id,
            'ds_return_url' => 'http://lc.capripvt.tiez.net/index.php?route=test/checkDocuSignReturn', //$GLOBALS['app_url'] . 'index.php?page=ds_return'
        ];
        $args = [
            'account_id' => '152843f3-c13e-4357-8da1-bff221d3fb35', //$_SESSION['ds_account_id'],
            'base_path' => 'https://demo.docusign.net/restapi', //$_SESSION['ds_base_path'],
            'ds_access_token' => 'eyJ0eXAiOiJNVCIsImFsZyI6IlJTMjU2Iiwia2lkIjoiNjgxODVmZjEtNGU1MS00Y2U5LWFmMWMtNjg5ODEyMjAzMzE3In0.AQoAAAABAAUABwCAEP7jf2PYSAgAgFAh8sJj2EgCAJm90xWnjB5NjL9sawZjOygVAAEAAAAYAAEAAAAFAAAADQAkAAAAYjk5MTEyYjktMjQ3YS00YjUwLWE0YjYtMjU2ZDY5NTA2OGQxIgAkAAAAYjk5MTEyYjktMjQ3YS00YjUwLWE0YjYtMjU2ZDY5NTA2OGQxMACAPvKMc2PYSDcAnPXwJsDCuUmPGZmE2sE4Vg.p5O-fCQD8Go9lRZcqfqYR0bYseN30Hw2MroB6XvCDeq4_dPqalVmNsooG43EnCCM8ei_o6NjtawFNqe0d08G6MQ0GMjyR57w_iRhW2M3tl8m18xoz2N_P5S2e8yhdSZbkP7KVEbBvT4R1Qud5z2ZGcrFkqXre-MYSk54OncKkctY0DYuct-hKjoU7jsJwLj-wf_KCesLNIP4fORcTXcMvnDuLwNSAxvRI5wr5kZKNrEoSL4Bbp1Rd97rDCXCrs01hsjOk2HAjqKRmvx8KzTiZp6e5Um_B7834zVRGUqWxvsELwARWZqQeEPNa0Jca5K5Jzkj1fzwYdrB_vWUlP9npg', //$_SESSION['ds_access_token'],
            'envelope_args' => $envelope_args
        ];

        //echo "<pre>"; print_r($_SESSION);


        /*
        Array
(
    [account_id] => 152843f3-c13e-4357-8da1-bff221d3fb35
    [base_path] => https://demo.docusign.net/restapi
    [ds_access_token] => eyJ0eXAiOiJNVCIsImFsZyI6IlJTMjU2Iiwia2lkIjoiNjgxODVmZjEtNGU1MS00Y2U5LWFmMWMtNjg5ODEyMjAzMzE3In0.AQsAAAABAAUABwCAW3BlUmHYSAgAgJuTc5Vh2EgCAJm90xWnjB5NjL9sawZjOygVAAEAAAAYAAEAAAAFAAAADQAkAAAAYjk5MTEyYjktMjQ3YS00YjUwLWE0YjYtMjU2ZDY5NTA2OGQxIgAkAAAAYjk5MTEyYjktMjQ3YS00YjUwLWE0YjYtMjU2ZDY5NTA2OGQxEgABAAAACwAAAGludGVyYWN0aXZlMACALj9kUmHYSDcAnPXwJsDCuUmPGZmE2sE4Vg.w4gCQZL1XofQCz5in64Kzsq7fkb-AjxKLopO6qK-KcZSsB1Pu0INT5i_NVqIlmEDnlDYr2KJBhGWOD2uC3roIG6rW8oPNQYX7phHPkBDFsGeMgjCJrL35aIKb6MpmXwWiG5WkJfYRHr1KxLqoD2Q6j9TyCi6gHvu2ZWVtOLu9mqU3FX9YoL8-AEkdTkl6PrTrA6896MXGsmHZYP67igAB4YW6Qk0bAlruSRvkyVuES_RYvfblyF4GmRYnPWEb4zenaMwwloAfviYlWXBQb_-9T7uQ_riAicr2nOi-bpGnTyyNJPf1mLvogspOrqpFcPx9Q8cEuV585VIsplop3rjKg
    [envelope_args] => Array
        (
            [signer_email] => chetan.thumar@tiez.nl
            [signer_name] => Chetan Thumar
            [signer_client_id] => 1000
            [ds_return_url] => http://lc.docu.com/index.php?page=ds_return
        )

)
        */
        return $args;
    }

    // http://lc.capripvt.tiez.net/index.php?route=test/downloadDocuSignDoc&envelope_id=80ce2709-f62a-4645-881b-a6956d0ff242
    public function downloadDocuSignDoc(){
        $envelope_id = $_GET['envelope_id'];
        $document_id = 1;

        
        $envelope_documents['documents'] = [['document_id' => 1, 'name' => $GLOBALS['DS_CONFIG']['doc_pdf']]];
        $args = [
            'account_id' => '152843f3-c13e-4357-8da1-bff221d3fb35', //$_SESSION['ds_account_id'],
            'base_path' => 'https://demo.docusign.net/restapi', //$_SESSION['ds_base_path'],
            'ds_access_token' => 'eyJ0eXAiOiJNVCIsImFsZyI6IlJTMjU2Iiwia2lkIjoiNjgxODVmZjEtNGU1MS00Y2U5LWFmMWMtNjg5ODEyMjAzMzE3In0.AQoAAAABAAUABwCAEP7jf2PYSAgAgFAh8sJj2EgCAJm90xWnjB5NjL9sawZjOygVAAEAAAAYAAEAAAAFAAAADQAkAAAAYjk5MTEyYjktMjQ3YS00YjUwLWE0YjYtMjU2ZDY5NTA2OGQxIgAkAAAAYjk5MTEyYjktMjQ3YS00YjUwLWE0YjYtMjU2ZDY5NTA2OGQxMACAPvKMc2PYSDcAnPXwJsDCuUmPGZmE2sE4Vg.p5O-fCQD8Go9lRZcqfqYR0bYseN30Hw2MroB6XvCDeq4_dPqalVmNsooG43EnCCM8ei_o6NjtawFNqe0d08G6MQ0GMjyR57w_iRhW2M3tl8m18xoz2N_P5S2e8yhdSZbkP7KVEbBvT4R1Qud5z2ZGcrFkqXre-MYSk54OncKkctY0DYuct-hKjoU7jsJwLj-wf_KCesLNIP4fORcTXcMvnDuLwNSAxvRI5wr5kZKNrEoSL4Bbp1Rd97rDCXCrs01hsjOk2HAjqKRmvx8KzTiZp6e5Um_B7834zVRGUqWxvsELwARWZqQeEPNa0Jca5K5Jzkj1fzwYdrB_vWUlP9npg', //$_SESSION['ds_access_token'],
            'envelope_id' => $envelope_id,
            'document_id' => $document_id,
            'envelope_documents' => $envelope_documents
        ];
        //echo "<pre>";print_r($args);exit;
        $results = $this->docDownloadWorker($args);

        if ($results) {
            # See https://stackoverflow.com/a/27805443/64904
            header("Content-Type: {$results['mimetype']}");
            header("Content-Disposition: attachment; filename=\"{$results['doc_name']}\"");
            ob_clean();
            flush();
            $file_path = $results['data']->getPathname();
            readfile($file_path);
            exit();
        }

        
    }


    /**
     * Do the work of the example
     * 1. Call the envelope documents list method
     *
     * @param  $args array
     * @return array
     * @throws ApiException for API problems and perhaps file access \Exception too.
     */
    # ***DS.snippet.0.start
    private function docDownloadWorker(array $args): array
    {
        # 1. call API method
        # Exceptions will be caught by the calling function
        $envelope_api = $this->clientService->getEnvelopeApi();

        # An SplFileObject is returned. See http://php.net/manual/en/class.splfileobject.php
        $temp_file = $envelope_api->getDocument($args['account_id'],  $args['document_id'], $args['envelope_id']);
        # find the matching document information item
        $doc_item = false;
        foreach ($args['envelope_documents']['documents'] as $item) {
            if ($item['document_id'] ==  $args['document_id']) {
                $doc_item = $item;
                break;
            }
        }
        $doc_name = $doc_item['name'];
        $has_pdf_suffix = strtoupper(substr($doc_name, -4)) == '.PDF';
        $pdf_file = $has_pdf_suffix;
        # Add ".pdf" if it's a content or summary doc and doesn't already end in .pdf
        if ($doc_item["type"] == "content" || ($doc_item["type"] == "summary" && ! $has_pdf_suffix)) {
            $doc_name .= ".pdf";
            $pdf_file = true;
        }
        # Add .zip as appropriate
        if ($doc_item["type"] == "zip") {
            $doc_name .= ".zip";
        }
        # Return the file information
        if ($pdf_file) {
            $mimetype = 'application/pdf';
        } elseif ($doc_item["type"] == 'zip') {
            $mimetype = 'application/zip';
        } else {
            $mimetype = 'application/octet-stream';
        }
//echo "<pre>"; print_r(['mimetype' => $mimetype, 'doc_name' => $doc_name, 'data' => $temp_file]); exit;
        return ['mimetype' => $mimetype, 'doc_name' => $doc_name, 'data' => $temp_file];
    }
    # ***DS.snippet.0.end
}