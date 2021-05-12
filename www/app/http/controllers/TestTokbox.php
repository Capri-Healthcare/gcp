<?php

use OpenTok\OpenTok;
use OpenTok\MediaMode;
use OpenTok\ArchiveMode;
use OpenTok\Session;
use OpenTok\Role;

use Dompdf\Dompdf;

/**
* Test TestTokbox
*/
class TestTokbox extends Controller {
	
	public function index(){
		//$opentokObj =  new OpenTokCustomClass();
		//$opentokObj->createSession();
		echo "Chetan 1 ". "<br>" ."<pre>";
		

		$apiKey = "46903874";
		$apiSecret = "97bb131cba8d698ea5c70f862b8bc5d0b12f017c";

		$opentok = new OpenTok($apiKey, $apiSecret);

		// Create a session that attempts to use peer-to-peer streaming:
		$session = $opentok->createSession();

		// An automatically archived session:
		$sessionOptions = array(
			//'archiveMode' => ArchiveMode::ALWAYS,
			'mediaMode' => MediaMode::ROUTED
		);
		$session = $opentok->createSession($sessionOptions);


		// Store this sessionId in the database for later use
		$sessionId = $session->getSessionId();

		$options = array(
			'role'       => Role::MODERATOR,
			'expireTime' => time()+(1 * 24 * 60 * 60), // in one week
			'data'       => 'name=Johnny',
			'initialLayoutClassList' => array('focus')
		);
		$token = $session->generateToken($options);

		echo "<br> <br> sessionId: " . $sessionId;
		echo "<br> <br> token: " . $token;
		exit;


		
	}

	public function testDocument(){
		$phpWord = new PhpOffice\PhpWord\PhpWord();
		$section = $phpWord->addSection();
		
		$header = $section->addHeader();
		$header->addText('This is my fabulous header!');
		
		$footer = $section->addFooter();
		$footer->addText('www.umathakur.com', ['align' => 'cetner']);
		
		$textrun = $section->addTextRun();
		$textrun->addText('Some text. ');
		$textrun->addText('And more Text in this Paragraph.');
		
		$textrun = $section->addTextRun();
		$textrun->addText('New Paragraph! ', ['bold' => true]);
		$textrun->addText('With text...', ['italic' => true]);
		
		$rows = 10;
		$cols = 5;
		$section->addText('Basic table', ['size' => 16, 'bold' => true]);
		
		$table = $section->addTable();
		for ($row = 1; $row <= 8; $row++) { $table->addRow();
			for ($cell = 1; $cell <= 5; $cell++) { $table->addCell(1750)->addText("Row {$row}, Cell {$cell}");
			}
		}
		
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
		$objWriter->save('MyDocument.docx');
	}

	public function testPdf(){
		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$dompdf->loadHtml('<html>
		<head>
		  <style>
			@page { margin: 100px 25px; }
			header { position: fixed; top: -60px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
			
			p { page-break-after: always; }
			p:last-child { page-break-after: never; }
		  </style>
		</head>
		<body>
		  <header>header on each page</header>
		  <footer>https://umathakur.com</footer>
		  <main>
			<p>page1</p>
			<p>page2></p>
		  </main>
		</body>
		</html>');

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream();
	}
}