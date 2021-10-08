<?php echo $header; ?>
<script>function(e){var t=-1!==[!0,"true"].indexOf(e.getAttribute("aria-expanded"));e.setAttribute("aria-expanded",!t),e.parentNode.parentNode.nextSibling.classList.toggle("collapsed")}</script><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" /><link rel="stylesheet" href="report.css" />
    <section class="my-login-page">
		<div class="container reporter-view">
  <h1 class="ng-binding">Report for My Eye Record & Care</h1>
  <p><em class="ng-binding">
    Report Creator: Pooja Duddaiah,
    July 2, 2021
  </em></p>
  <p><em class="ng-binding">
    Evaluation Commissioner: Tarun Sharma
  </em></p>

  <h2 class="ng-binding">Summary of the evaluation findings</h2>
  <div data-ng-bind-html="report.summary | txtToHtml" class="ng-binding"><p>My Eye Record & Care (gcp.caprihealthcare.co.uk) was evaluated against the accessibility requirements of WCAG 2.1 using Wave (web accessibility evaluation tool) and IBM accessibility checker. All the outcomes and recommendations from the evaluation were carefully implemented before the final evaluation.  The website has passed the self-assessment.</p></div>

  <h2 class="ng-binding">Scope of the evaluation</h2>
  <!-- ngInclude: --><div data-ng-include="" data-src="'views/report/scope.html'" class="ng-scope"><table class="ng-scope">
  <tbody><tr><th class="ng-binding">Website name</th>
      <td class="ng-binding">GLAUCOMA CARE PLAN</td></tr>

  <tr>
    <th class="ng-binding">Scope of the website</th>
  	<td data-ng-bind-html="scope.website.siteScope | txtToHtml" class="ng-binding"><p>The following Web pages of the My Eye Record & Care, <a target="_blank" href="https://gcp.caprihealthcare.co.uk/">https://gcp.caprihealthcare.co.uk/</a><br>- Home page<br>- Login page<br>- Registration page</p></td>
  </tr>

  <tr><th class="ng-binding">WCAG Version</th>
      <td class="ng-binding">WCAG 2.1</td></tr>

  <tr><th class="ng-binding">Conformance target</th>
      <td class="ng-binding">Level AA</td></tr>

  <tr><th class="ng-binding">Additional evaluation requirements</th>
      <td data-ng-bind-html="scope.additionalEvalRequirement | txtToHtml" class="ng-binding"><p>The report will include a list of all errors identified by the evaluator.</p></td></tr>

  <tr><th class="ng-binding">Accessibility support baseline</th>
      <td data-ng-bind-html="scope.accessibilitySupportBaseline | txtToHtml" class="ng-binding"><p>Internet Explorer and Google Chrome with JAWS, and Apple with Speech.</p></td></tr>

  <!-- ngIf: explore.reliedUponTechnology.length > 0 --><tr data-ng-if="explore.reliedUponTechnology.length > 0" class="ng-scope">
    <th class="ng-binding">Relied upon technologies</th>
    <td><ul><!-- ngRepeat: tech in explore.reliedUponTechnology --><li data-ng-repeat="tech in explore.reliedUponTechnology" class="ng-scope">
		<!-- ngIf: tech.specs --><!-- ngIf: !tech.specs --><span data-ng-if="!tech.specs" class="ng-binding ng-scope">
		  HTML5
		</span><!-- end ngIf: !tech.specs -->
    </li><!-- end ngRepeat: tech in explore.reliedUponTechnology --><li data-ng-repeat="tech in explore.reliedUponTechnology" class="ng-scope">
		<!-- ngIf: tech.specs --><!-- ngIf: !tech.specs --><span data-ng-if="!tech.specs" class="ng-binding ng-scope">
		  CSS
		</span><!-- end ngIf: !tech.specs -->
    </li><!-- end ngRepeat: tech in explore.reliedUponTechnology --><li data-ng-repeat="tech in explore.reliedUponTechnology" class="ng-scope">
		<!-- ngIf: tech.specs --><!-- ngIf: !tech.specs --><span data-ng-if="!tech.specs" class="ng-binding ng-scope">
		  PHP
		</span><!-- end ngIf: !tech.specs -->
    </li><!-- end ngRepeat: tech in explore.reliedUponTechnology --><li data-ng-repeat="tech in explore.reliedUponTechnology" class="ng-scope">
		<!-- ngIf: tech.specs --><!-- ngIf: !tech.specs --><span data-ng-if="!tech.specs" class="ng-binding ng-scope">
		  Java script
		</span><!-- end ngIf: !tech.specs -->
    </li><!-- end ngRepeat: tech in explore.reliedUponTechnology --></ul></td>
  </tr><!-- end ngIf: explore.reliedUponTechnology.length > 0 -->

</tbody></table>
</div>

  <h2 class="ng-binding">Overview of audit results</h2>
  <!-- ngInclude: --><div data-ng-include="" data-src="'views/report/score.html'" class="ng-scope"><table ng-controller="ReportScoreCtrl" class="ng-scope">
  <caption class="ng-binding">
    Results of&nbsp;Level AA
  </caption>
  <thead><tr>
      <th class="ng-binding">Principle</th>
      <th class="ng-binding">Level A</th>
      <!-- ngIf: totals['level_aa'].total > 0 --><th ng-if="totals['level_aa'].total > 0" class="ng-binding ng-scope">Level AA</th><!-- end ngIf: totals['level_aa'].total > 0 -->
      <!-- ngIf: totals['level_aaa'].total > 0 -->
  </tr></thead>
  <tbody>
    <!-- ngRepeat: score in scores --><!-- ngIf: score.tested > 0 --><tr ng-repeat="score in scores" ng-if="score.tested > 0" class="ng-scope">
      <th class="ng-binding">1. Perceivable</th>
      <td class="ng-binding">9 / 9</td>
      <!-- ngIf: totals['level_aa'].total > 0 --><td ng-if="totals['level_aa'].total > 0" class="ng-binding ng-scope">11 / 11</td><!-- end ngIf: totals['level_aa'].total > 0 -->
      <!-- ngIf: totals['level_aaa'].total > 0 -->
    </tr><!-- end ngIf: score.tested > 0 --><!-- end ngRepeat: score in scores --><!-- ngIf: score.tested > 0 --><tr ng-repeat="score in scores" ng-if="score.tested > 0" class="ng-scope">
      <th class="ng-binding">2. Operable</th>
      <td class="ng-binding">14 / 14</td>
      <!-- ngIf: totals['level_aa'].total > 0 --><td ng-if="totals['level_aa'].total > 0" class="ng-binding ng-scope">3 / 3</td><!-- end ngIf: totals['level_aa'].total > 0 -->
      <!-- ngIf: totals['level_aaa'].total > 0 -->
    </tr><!-- end ngIf: score.tested > 0 --><!-- end ngRepeat: score in scores --><!-- ngIf: score.tested > 0 --><tr ng-repeat="score in scores" ng-if="score.tested > 0" class="ng-scope">
      <th class="ng-binding">3. Understandable</th>
      <td class="ng-binding">5 / 5</td>
      <!-- ngIf: totals['level_aa'].total > 0 --><td ng-if="totals['level_aa'].total > 0" class="ng-binding ng-scope">5 / 5</td><!-- end ngIf: totals['level_aa'].total > 0 -->
      <!-- ngIf: totals['level_aaa'].total > 0 -->
    </tr><!-- end ngIf: score.tested > 0 --><!-- end ngRepeat: score in scores --><!-- ngIf: score.tested > 0 --><tr ng-repeat="score in scores" ng-if="score.tested > 0" class="ng-scope">
      <th class="ng-binding">4. Robust</th>
      <td class="ng-binding">2 / 2</td>
      <!-- ngIf: totals['level_aa'].total > 0 --><td ng-if="totals['level_aa'].total > 0" class="ng-binding ng-scope">1 / 1</td><!-- end ngIf: totals['level_aa'].total > 0 -->
      <!-- ngIf: totals['level_aaa'].total > 0 -->
    </tr><!-- end ngIf: score.tested > 0 --><!-- end ngRepeat: score in scores -->
    <tr class="score-total">
      <th class="ng-binding">Total</th>
      <td class="ng-binding">30 / 30</td>
      <!-- ngIf: totals['level_aa'].total > 0 --><td ng-if="totals['level_aa'].total > 0" class="ng-binding ng-scope">20 / 20</td><!-- end ngIf: totals['level_aa'].total > 0 -->
      <!-- ngIf: totals['level_aaa'].total > 0 -->
    </tr>
  </tbody>
</table></div>

  <h2 class="ng-binding">Detailed audit results</h2>
  <!-- ngInclude: --><div data-ng-include="" data-src="'views/report/findings.html'" class="ng-scope"><div data-ng-controller="ReportFindingsCtrl" class="ng-scope">
  <!-- ngRepeat: p in principles --><div data-ng-repeat="p in principles" class="ng-scope">
    <h3 class="ng-binding">Principle
    1 Perceivable</h3>

    <!-- ngRepeat: g in p.guidelines --><div data-ng-repeat="g in p.guidelines" class="ng-scope">
      <h4 class="ng-binding">1.1 Text Alternatives</h4>
      <!-- ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.1.1 Non-text Content</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">All non-text content that is presented to the user has a text alternative that serves the equivalent purpose, except for the situations listed below.</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' --><ul ng-if="detail.type === 'ulist'" class="ng-scope">
          <!-- ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Controls, Input
            </strong><!-- end ngIf: item.handle -->
            If non-text content is a control or accepts user input, then it has a name that describes its purpose. (Refer to Guideline 4.1 for additional requirements for controls and content that accepts user input.)
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Time-Based Media
            </strong><!-- end ngIf: item.handle -->
            If non-text content is time-based media, then text alternatives at least provide descriptive identification of the non-text content. (Refer to Guideline 1.2 for additional requirements for media.)
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Test
            </strong><!-- end ngIf: item.handle -->
            If non-text content is a test or exercise that would be invalid if presented in text, then text alternatives at least provide descriptive identification of the non-text content.
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Sensory
            </strong><!-- end ngIf: item.handle -->
            If non-text content is primarily intended to create a specific sensory experience, then text alternatives at least provide descriptive identification of the non-text content.
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              CAPTCHA
            </strong><!-- end ngIf: item.handle -->
            If the purpose of non-text content is to confirm that content is being accessed by a person rather than a computer, then text alternatives that identify and describe the purpose of the non-text content are provided, and alternative forms of CAPTCHA using output modes for different types of sensory perception are provided to accommodate different disabilities.
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Decoration, Formatting, Invisible
            </strong><!-- end ngIf: item.handle -->
            If non-text content is pure decoration, is used only for visual formatting, or is not presented to users, then it is implemented in a way that it can be ignored by assistive technology.
          </li><!-- end ngRepeat: item in detail.items -->
        </ul><!-- end ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/non-text-content.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#non-text-content" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> All non-text content that is presented on the website has a text alternative.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria -->
    </div><!-- end ngRepeat: g in p.guidelines --><div data-ng-repeat="g in p.guidelines" class="ng-scope">
      <h4 class="ng-binding">1.2 Time-based Media</h4>
      <!-- ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.2.1 Audio-only and Video-only (Prerecorded)</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">For prerecorded audio-only and prerecorded video-only media, the following are true, except when the audio or video is a media alternative for text and is clearly labeled as such:</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' --><ul ng-if="detail.type === 'ulist'" class="ng-scope">
          <!-- ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Prerecorded Audio-only
            </strong><!-- end ngIf: item.handle -->
            An alternative for time-based media is provided that presents equivalent information for prerecorded audio-only content.
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Prerecorded Video-only
            </strong><!-- end ngIf: item.handle -->
            Either an alternative for time-based media or an audio track is provided that presents equivalent information for prerecorded video-only content.
          </li><!-- end ngRepeat: item in detail.items -->
        </ul><!-- end ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/audio-only-and-video-only-prerecorded.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#audio-only-and-video-only-prerecorded" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Currently not displaying any video.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.2.2 Captions (Prerecorded)</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Captions are provided for all prerecorded audio content in synchronized media, except when the media is a media alternative for text and is clearly labeled as such.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/captions-prerecorded.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#captions-prerecorded" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Currently not displaying any video.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.2.3 Audio Description or Media Alternative (Prerecorded)</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">An alternative for time-based media or audio description of the prerecorded video content is provided for synchronized media, except when the media is a media alternative for text and is clearly labeled as such.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/audio-description-or-media-alternative-prerecorded.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#audio-description-or-media-alternative-prerecorded" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Currently not displaying any audio.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.2.4 Captions (Live)</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Captions are provided for all live audio content in synchronized media.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/captions-live.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#captions-live" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Currently not displaying any video.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.2.5 Audio Description (Prerecorded)</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Audio description is provided for all prerecorded video content in synchronized media.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/audio-description-prerecorded.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#audio-description-prerecorded" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Currently not displaying any audio.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria -->
    </div><!-- end ngRepeat: g in p.guidelines --><div data-ng-repeat="g in p.guidelines" class="ng-scope">
      <h4 class="ng-binding">1.3 Adaptable</h4>
      <!-- ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.3.1 Info and Relationships</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Information, structure, and relationships conveyed through presentation can be programmatically determined or are available in text.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/info-and-relationships.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#info-and-relationships" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Our web portal does meet the requirement.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.3.2 Meaningful Sequence</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">When the sequence in which content is presented affects its meaning, a correct reading sequence can be programmatically determined.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/meaningful-sequence.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#meaningful-sequence" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Our web portal does meet the requirement.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.3.3 Sensory Characteristics</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Instructions provided for understanding and operating content do not rely solely on sensory characteristics of components such as shape, size, visual location, orientation, or sound.</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/sensory-characteristics.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#sensory-characteristics" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Our web pages meets the Sensory Characteristics requirement.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.3.4 Orientation</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Content does not restrict its view and operation to a single display orientation, such as portrait or landscape, unless a specific display orientation is essential.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/orientation.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#orientation" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Content does not restrict its view and operation.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.3.5 Identify Input Purpose</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">The purpose of each input field collecting information about the user can be programmatically determined when:</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' --><ul ng-if="detail.type === 'ulist'" class="ng-scope">
          <!-- ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle -->
            The input field serves a purpose identified in the Input Purposes for User Interface Components section; and
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle -->
            The content is implemented using technologies with support for identifying the expected meaning for form input data.
          </li><!-- end ngRepeat: item in detail.items -->
        </ul><!-- end ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/identify-input-purpose.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#identify-input-purpose" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Input purpose identified where required.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria -->
    </div><!-- end ngRepeat: g in p.guidelines --><div data-ng-repeat="g in p.guidelines" class="ng-scope">
      <h4 class="ng-binding">1.4 Distinguishable</h4>
      <!-- ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.4.1 Use of Color</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Color is not used as the only visual means of conveying information, indicating an action, prompting a response, or distinguishing a visual element.</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/use-of-color.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#use-of-color" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Color is not used as the only visual means of conveying information on the website.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.4.2 Audio Control</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">If any audio on a Web page plays automatically for more than 3 seconds, either a mechanism is available to pause or stop the audio, or a mechanism is available to control audio volume independently from the overall system volume level.</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/audio-control.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#audio-control" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Currently not displaying any audio.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.4.3 Contrast (Minimum)</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">The visual presentation of text and images of text has a contrast ratio of at least 4.5:1, except for the following:</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' --><ul ng-if="detail.type === 'ulist'" class="ng-scope">
          <!-- ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Large Text
            </strong><!-- end ngIf: item.handle -->
            Large-scale text and images of large-scale text have a contrast ratio of at least 3:1;
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Incidental
            </strong><!-- end ngIf: item.handle -->
            Text or images of text that are part of an inactive user interface component, that are pure decoration, that are not visible to anyone, or that are part of a picture that contains significant other visual content, have no contrast requirement.
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Logotypes
            </strong><!-- end ngIf: item.handle -->
            Text that is part of a logo or brand name has no minimum contrast requirement.
          </li><!-- end ngRepeat: item in detail.items -->
        </ul><!-- end ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/contrast-minimum.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#contrast-minimum" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> All the web pages meets the contrast ratio.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.4.4 Resize text</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Except for captions and images of text, text can be resized without assistive technology up to 200 percent without loss of content or functionality.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/resize-text.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#resize-text" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Web pages can be resized to 200 percent.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.4.5 Images of Text</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">If the technologies being used can achieve the visual presentation, text is used to convey information rather than images of text except for the following:</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' --><ul ng-if="detail.type === 'ulist'" class="ng-scope">
          <!-- ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Customizable
            </strong><!-- end ngIf: item.handle -->
            The image of text can be visually customized to the user's requirements;
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Essential
            </strong><!-- end ngIf: item.handle -->
            A particular presentation of text is essential to the information being conveyed.
          </li><!-- end ngRepeat: item in detail.items -->
        </ul><!-- end ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/images-of-text.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#images-of-text" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Our web portal does not contain Image of text</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.4.10 Reflow</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Content can be presented without loss of information or functionality, and without requiring scrolling in two dimensions for:</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' --><ul ng-if="detail.type === 'ulist'" class="ng-scope">
          <!-- ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle -->
            Vertical scrolling content at a width equivalent to 320 CSS pixels;
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle -->
            Horizontal scrolling content at a height equivalent to 256 CSS pixels;
          </li><!-- end ngRepeat: item in detail.items -->
        </ul><!-- end ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/reflow.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#reflow" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> The pages on our website have been designed based on responsive techniques and don't need scrolling.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.4.11 Non-text Contrast</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">The visual presentation of the following have a contrast ratio of at least 3:1 against adjacent color(s):</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' --><ul ng-if="detail.type === 'ulist'" class="ng-scope">
          <!-- ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              User Interface Components
            </strong><!-- end ngIf: item.handle -->
            Visual information required to identify user interface components and states, except for inactive components or where the appearance of the component is determined by the user agent and not modified by the author;
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Graphical Objects
            </strong><!-- end ngIf: item.handle -->
            Parts of graphics required to understand the content, except when a particular presentation of graphics is essential to the information being conveyed.
          </li><!-- end ngRepeat: item in detail.items -->
        </ul><!-- end ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/non-text-contrast.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#non-text-contrast" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Our web pages meets the non-text contrast requirement.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.4.12 Text Spacing</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">In content implemented using markup languages that support the following text style properties, no loss of content or functionality occurs by setting all of the following and by changing no other style property:</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' --><ul ng-if="detail.type === 'ulist'" class="ng-scope">
          <!-- ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle -->
            Line height (line spacing) to at least 1.5 times the font size;
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle -->
            Spacing following paragraphs to at least 2 times the font size;
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle -->
            Letter spacing (tracking) to at least 0.12 times the font size;
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle -->
            Word spacing to at least 0.16 times the font size.
          </li><!-- end ngRepeat: item in detail.items -->
        </ul><!-- end ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/text-spacing.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#text-spacing" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> All the web pages content have the correct spacing.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">1.4.13 Content on Hover or Focus</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Where receiving and then removing pointer hover or keyboard focus triggers additional content to become visible and then hidden, the following are true:</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' --><ul ng-if="detail.type === 'ulist'" class="ng-scope">
          <!-- ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Dismissable
            </strong><!-- end ngIf: item.handle -->
            A mechanism is available to dismiss the additional content without moving pointer hover or keyboard focus, unless the additional content communicates an input error or does not obscure or replace other content;
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Hoverable
            </strong><!-- end ngIf: item.handle -->
            If pointer hover can trigger the additional content, then the pointer can be moved over the additional content without the additional content disappearing;
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Persistent
            </strong><!-- end ngIf: item.handle -->
            The additional content remains visible until the hover or focus trigger is removed, the user dismisses it, or its information is no longer valid.
          </li><!-- end ngRepeat: item in detail.items -->
        </ul><!-- end ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/content-on-hover-or-focus.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#content-on-hover-or-focus" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> No Hover / Focus content on the website.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria -->
    </div><!-- end ngRepeat: g in p.guidelines -->

  </div><!-- end ngRepeat: p in principles --><div data-ng-repeat="p in principles" class="ng-scope">
    <h3 class="ng-binding">Principle
    2 Operable</h3>

    <!-- ngRepeat: g in p.guidelines --><div data-ng-repeat="g in p.guidelines" class="ng-scope">
      <h4 class="ng-binding">2.1 Keyboard Accessible</h4>
      <!-- ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.1.1 Keyboard</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">All functionality of the content is operable through a keyboard interface without requiring specific timings for individual keystrokes, except where the underlying function requires input that depends on the path of the user's movement and not just the endpoints.</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/keyboard.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#keyboard" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Our web portal does meet the requirement.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.1.2 No Keyboard Trap</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">If keyboard focus can be moved to a component of the page using a keyboard interface, then focus can be moved away from that component using only a keyboard interface, and, if it requires more than unmodified arrow or tab keys or other standard exit methods, the user is advised of the method for moving focus away.</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/no-keyboard-trap.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#no-keyboard-trap" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> There are no Keyboard Trap on the website.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.1.4 Character Key Shortcuts</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">If a keyboard shortcut is implemented in content using only letter (including upper- and lower-case letters), punctuation, number, or symbol characters, then at least one of the following is true:</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' --><ul ng-if="detail.type === 'ulist'" class="ng-scope">
          <!-- ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Turn off
            </strong><!-- end ngIf: item.handle -->
            A mechanism is available to turn the shortcut off;
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Remap
            </strong><!-- end ngIf: item.handle -->
            A mechanism is available to remap the shortcut to use one or more non-printable keyboard characters (e.g. Ctrl, Alt, etc);
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Active only on focus
            </strong><!-- end ngIf: item.handle -->
            The keyboard shortcut for a user interface component is only active when that component has focus.
          </li><!-- end ngRepeat: item in detail.items -->
        </ul><!-- end ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/character-key-shortcuts.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#character-key-shortcuts" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Character Key Shortcuts are not present.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria -->
    </div><!-- end ngRepeat: g in p.guidelines --><div data-ng-repeat="g in p.guidelines" class="ng-scope">
      <h4 class="ng-binding">2.2 Enough Time</h4>
      <!-- ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.2.1 Timing Adjustable</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">For each time limit that is set by the content, at least one of the following is true:</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' --><ul ng-if="detail.type === 'ulist'" class="ng-scope">
          <!-- ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Turn off
            </strong><!-- end ngIf: item.handle -->
            The user is allowed to turn off the time limit before encountering it; or
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Adjust
            </strong><!-- end ngIf: item.handle -->
            The user is allowed to adjust the time limit before encountering it over a wide range that is at least ten times the length of the default setting; or
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Extend
            </strong><!-- end ngIf: item.handle -->
            The user is warned before time expires and given at least 20 seconds to extend the time limit with a simple action (for example, "press the space bar"), and the user is allowed to extend the time limit at least ten times; or
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Real-time Exception
            </strong><!-- end ngIf: item.handle -->
            The time limit is a required part of a real-time event (for example, an auction), and no alternative to the time limit is possible; or
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Essential Exception
            </strong><!-- end ngIf: item.handle -->
            The time limit is essential and extending it would invalidate the activity; or
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              20 Hour Exception
            </strong><!-- end ngIf: item.handle -->
            The time limit is longer than 20 hours.
          </li><!-- end ngRepeat: item in detail.items -->
        </ul><!-- end ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/timing-adjustable.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#timing-adjustable" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> There is no Time limit that is set by the content</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.2.2 Pause, Stop, Hide</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">For moving, blinking, scrolling, or auto-updating information, all of the following are true:</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' --><ul ng-if="detail.type === 'ulist'" class="ng-scope">
          <!-- ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Moving, blinking, scrolling
            </strong><!-- end ngIf: item.handle -->
            For any moving, blinking or scrolling information that (1) starts automatically, (2) lasts more than five seconds, and (3) is presented in parallel with other content, there is a mechanism for the user to pause, stop, or hide it unless the movement, blinking, or scrolling is part of an activity where it is essential; and
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Auto-updating
            </strong><!-- end ngIf: item.handle -->
            For any auto-updating information that (1) starts automatically and (2) is presented in parallel with other content, there is a mechanism for the user to pause, stop, or hide it or to control the frequency of the update unless the auto-updating is part of an activity where it is essential.
          </li><!-- end ngRepeat: item in detail.items -->
        </ul><!-- end ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/pause-stop-hide.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#pause-stop-hide" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Moving, blinking, scrolling, or auto-updating information are not present</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria -->
    </div><!-- end ngRepeat: g in p.guidelines --><div data-ng-repeat="g in p.guidelines" class="ng-scope">
      <h4 class="ng-binding">2.3 Seizures and Physical Reactions</h4>
      <!-- ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.3.1 Three Flashes or Below Threshold</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Web pages do not contain anything that flashes more than three times in any one second period, or the flash is below the general flash and red flash thresholds.</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/three-flashes-or-below-threshold.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#three-flashes-or-below-threshold" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Web pages do not contain anything that flashes more than three times in any one second period, or the flash is below the general flash and red flash thresholds.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria -->
    </div><!-- end ngRepeat: g in p.guidelines --><div data-ng-repeat="g in p.guidelines" class="ng-scope">
      <h4 class="ng-binding">2.4 Navigable</h4>
      <!-- ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.4.1 Bypass Blocks</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">A mechanism is available to bypass blocks of content that are repeated on multiple Web pages.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/bypass-blocks.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#bypass-blocks" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Not present</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.4.2 Page Titled</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Web pages have titles that describe topic or purpose.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/page-titled.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#page-titled" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Web pages have titles that describe topic or purpose.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.4.3 Focus Order</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">If a Web page can be navigated sequentially and the navigation sequences affect meaning or operation, focusable components receive focus in an order that preserves meaning and operability.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/focus-order.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#focus-order" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Web page can be navigated sequentially</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.4.4 Link Purpose (In Context)</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">The purpose of each link can be determined from the link text alone or from the link text together with its programmatically determined link context, except where the purpose of the link would be ambiguous to users in general.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/link-purpose-in-context.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#link-purpose-in-context" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Our web portal does meet the requirements.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.4.5 Multiple Ways</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">More than one way is available to locate a Web page within a set of Web pages except where the Web Page is the result of, or a step in, a process.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/multiple-ways.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#multiple-ways" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> No more than one way is available to locate a Web page.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.4.6 Headings and Labels</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Headings and labels describe topic or purpose.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/headings-and-labels.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#headings-and-labels" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Headings and labels are present through out in our website.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.4.7 Focus Visible</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Any keyboard operable user interface has a mode of operation where the keyboard focus indicator is visible.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/focus-visible.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#focus-visible" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Our website meet the requirements.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria -->
    </div><!-- end ngRepeat: g in p.guidelines --><div data-ng-repeat="g in p.guidelines" class="ng-scope">
      <h4 class="ng-binding">2.5 Input Modalities</h4>
      <!-- ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.5.1 Pointer Gestures</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">All functionality that uses multipoint or path-based gestures for operation can be operated with a single pointer without a path-based gesture, unless a multipoint or path-based gesture is essential.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/pointer-gestures.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#pointer-gestures" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> This functionality is not needed</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.5.2 Pointer Cancellation</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">For functionality that can be operated using a single pointer, at least one of the following is true:</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' --><ul ng-if="detail.type === 'ulist'" class="ng-scope">
          <!-- ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              No Down-Event
            </strong><!-- end ngIf: item.handle -->
            The down-event of the pointer is not used to execute any part of the function;
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Abort or Undo
            </strong><!-- end ngIf: item.handle -->
            Completion of the function is on the up-event, and a mechanism is available to abort the function before completion or to undo the function after completion;
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Up Reversal
            </strong><!-- end ngIf: item.handle -->
            The up-event reverses any outcome of the preceding down-event;
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Essential
            </strong><!-- end ngIf: item.handle -->
            Completing the function on the down-event is essential.
          </li><!-- end ngRepeat: item in detail.items -->
        </ul><!-- end ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/pointer-cancellation.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#pointer-cancellation" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Our website meet Pointer Cancellation the requirement.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.5.3 Label in Name</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">For user interface components with labels that include text or images of text, the name contains the text that is presented visually.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/label-in-name.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#label-in-name" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Our website meet  the requirement.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">2.5.4 Motion Actuation</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Functionality that can be operated by device motion or user motion can also be operated by user interface components and responding to the motion can be disabled to prevent accidental actuation, except when:</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' --><ul ng-if="detail.type === 'ulist'" class="ng-scope">
          <!-- ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Supported Interface
            </strong><!-- end ngIf: item.handle -->
            The motion is used to operate functionality through an accessibility supported interface;
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Essential
            </strong><!-- end ngIf: item.handle -->
            The motion is essential for the function and doing so would invalidate the activity.
          </li><!-- end ngRepeat: item in detail.items -->
        </ul><!-- end ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/motion-actuation.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#motion-actuation" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> There is no functionality that can be operated by device motion</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria -->
    </div><!-- end ngRepeat: g in p.guidelines -->

  </div><!-- end ngRepeat: p in principles --><div data-ng-repeat="p in principles" class="ng-scope">
    <h3 class="ng-binding">Principle
    3 Understandable</h3>

    <!-- ngRepeat: g in p.guidelines --><div data-ng-repeat="g in p.guidelines" class="ng-scope">
      <h4 class="ng-binding">3.1 Readable</h4>
      <!-- ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">3.1.1 Language of Page</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">The default human language of each Web page can be programmatically determined.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/language-of-page.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#language-of-page" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Our website meet the requirement.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">3.1.2 Language of Parts</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">The human language of each passage or phrase in the content can be programmatically determined except for proper names, technical terms, words of indeterminate language, and words or phrases that have become part of the vernacular of the immediately surrounding text.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/language-of-parts.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#language-of-parts" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> All text is in English on the web portal.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria -->
    </div><!-- end ngRepeat: g in p.guidelines --><div data-ng-repeat="g in p.guidelines" class="ng-scope">
      <h4 class="ng-binding">3.2 Predictable</h4>
      <!-- ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">3.2.1 On Focus</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">When any component receives focus, it does not initiate a change of context.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/on-focus.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#on-focus" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> When any component receives focus, it does not initiate a change of context.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">3.2.2 On Input</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Changing the setting of any user interface component does not automatically cause a change of context unless the user has been advised of the behavior before using the component.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/on-input.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#on-input" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Our website meet the requirement.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">3.2.3 Consistent Navigation</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Navigational mechanisms that are repeated on multiple Web pages within a set of Web pages occur in the same relative order each time they are repeated, unless a change is initiated by the user.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/consistent-navigation.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#consistent-navigation" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Navigation mechanism is not present</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">3.2.4 Consistent Identification</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Components that have the same functionality within a set of Web pages are identified consistently.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/consistent-identification.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#consistent-identification" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Components that have the same functionality within a set of Web pages are identified consistently.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria -->
    </div><!-- end ngRepeat: g in p.guidelines --><div data-ng-repeat="g in p.guidelines" class="ng-scope">
      <h4 class="ng-binding">3.3 Input Assistance</h4>
      <!-- ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">3.3.1 Error Identification</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">If an input error is automatically detected, the item that is in error is identified and the error is described to the user in text.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/error-identification.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#error-identification" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> If an input error is automatically detected, the item that is in error is identified and the error is described to the user in text.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">3.3.2 Labels or Instructions</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">Labels or instructions are provided when content requires user input.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/labels-or-instructions.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#labels-or-instructions" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Labels or instructions are provided when content requires user input.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">3.3.3 Error Suggestion</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">If an input error is automatically detected and suggestions for correction are known, then the suggestions are provided to the user, unless it would jeopardize the security or purpose of the content.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/error-suggestion.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#error-suggestion" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Input error is automatically detected and suggestions for correction are shown.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope inapplicable" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">3.3.4 Error Prevention (Legal, Financial, Data)</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">For Web pages that cause legal commitments or financial transactions for the user to occur, that modify or delete user-controllable data in data storage systems, or that submit user test responses, at least one of the following is true:</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' --><ol ng-if="detail.type === 'olist'" class="ng-scope">
          <!-- ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Reversible
            </strong><!-- end ngIf: item.handle -->
            Submissions are reversible.
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Checked
            </strong><!-- end ngIf: item.handle -->
            Data entered by the user is checked for input errors and the user is provided an opportunity to correct them.
          </li><!-- end ngRepeat: item in detail.items --><li ng-repeat="item in detail.items" class="ng-binding ng-scope">
            <!-- ngIf: item.handle --><strong ng-if="item.handle" class="ng-binding ng-scope">
              Confirmed
            </strong><!-- end ngIf: item.handle -->
            A mechanism is available for reviewing, confirming, and correcting information before finalizing the submission.
          </li><!-- end ngRepeat: item in detail.items -->
        </ol><!-- end ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/error-prevention-legal-financial-data.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#error-prevention-legal-financial-data" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Website does not handle legal and financial data.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria -->
    </div><!-- end ngRepeat: g in p.guidelines -->

  </div><!-- end ngRepeat: p in principles --><div data-ng-repeat="p in principles" class="ng-scope">
    <h3 class="ng-binding">Principle
    4 Robust</h3>

    <!-- ngRepeat: g in p.guidelines --><div data-ng-repeat="g in p.guidelines" class="ng-scope">
      <h4 class="ng-binding">4.1 Compatible</h4>
      <!-- ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">4.1.1 Parsing</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">In content implemented using markup languages, elements have complete start and end tags, elements are nested according to their specifications, elements do not contain duplicate attributes, and any IDs are unique, except where the specifications allow these features.</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/parsing.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#parsing" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Our website meet the requirement.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">4.1.2 Name, Role, Value</strong>: (Level A)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">For all user interface components (including but not limited to: form elements, links and components generated by scripts), the name and role can be programmatically determined; states, properties, and values that can be set by the user can be programmatically set; and notification of changes to these items is available to user agents, including assistive technologies.</p><p>
      </p><!-- ngRepeat: detail in spec.details --><div ng-repeat="detail in spec.details" class="ng-scope">
        <!-- ngIf: detail.type === 'ulist' -->
        <!-- ngIf: detail.type === 'olist' -->
        <!-- ngIf: details.type === 'note' -->
      </div><!-- end ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/name-role-value.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#name-role-value" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> Our website meet the requirement.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria --><!-- ngIf: shouldCritRender(critSpec) --><div class="panel criterion panel-default ng-scope ng-isolate-scope passed" ng-class="getClassName(assert.result.outcome)" data-ng-repeat="critSpec in g.successcriteria" assertion="getCritAssert(critSpec.id)" data-ng-if="shouldCritRender(critSpec)" requirement="critSpec" options="critOpt">

  <div class="panel-heading earl-assert ng-isolate-scope" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 criterion-title ng-binding ng-scope">
      <strong class="ng-binding">4.1.3 Status Messages</strong>: (Level AA)
      <span class="pull-right">
        <button onclick="toggleCriterionText(this)" class="btn btn-default glyphicon glyphicon-education" aria-expanded="false">
            <span class="hint ng-binding">Show criterion text</span>
        </button>
      </span>

    </div><div class="col-xs-12 crit-text collapsed ng-scope">
      <p class="ng-binding">In content implemented using markup languages, status messages can be programmatically determined through role or properties such that they can be presented to the user by assistive technologies without receiving focus.</p><p>
      </p><!-- ngRepeat: detail in spec.details -->
      <p>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/Understanding/status-messages.html" class="ng-binding">Understanding 
          <span class="glyphicon glyphicon-new-window"></span></a>
        <a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/#status-messages" class="ng-binding">How to meet 
          <span class="glyphicon glyphicon-new-window"></span></a>
      </p>
    </div>
    <div class="col-xs-12 ng-binding ng-scope">Results for the entire sample:</div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> All status are accurately displayed.</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div>

  <!-- ngIf: opt.collapses -->

  <!-- ngIf: rootHide[critHide] || !opt.collapses --><div options="opt" assert="assert" class="appear-tall ng-scope ng-isolate-scope" ng-if="rootHide[critHide] || !opt.collapses">

  <!-- ngIf: multiPageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length > 0 --><div ng-if="singlePageAsserts.length > 0" class="panel-body assert-indent appear ng-scope ng-isolate-scope" asserts="singlePageAsserts" value="criterion" options="opt">
  <!-- ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Not present
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=register)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts --><div class="appear earl-assert ng-scope ng-isolate-scope" ng-repeat="assert in asserts" assert="assert" options="opt">
  <div class="row" ng-transclude="">

    <div class="col-xs-12 ng-binding ng-scope">
      Results for:
      <em ng-bind="assert.subject[0].displayHandle()" class="ng-binding"></em>
      <!-- ngIf: assert.subject[0].description --><span ng-if="assert.subject[0].description" class="ng-binding ng-scope">
        (https://gcp.caprihealthcare.co.uk/index.php?route=login)
      </span><!-- end ngIf: assert.subject[0].description -->
    </div>

  </div>

  <!-- ngIf: opt.editable -->
  
  
  <!-- ngIf: !opt.editable --><div class="row outcome ng-scope" ng-if="!opt.editable">
    <div class="col-sm-4 col-md-3 ng-binding">
      <strong class="ng-binding">Outcome</strong>:&nbsp;Passed
    </div>

    <div class="col-sm-8 col-md-9 ng-binding" ng-init="" ng-bind-html="htmlResult"><p><strong>Findings:</strong> –</p></div>
  </div><!-- end ngIf: !opt.editable -->

</div><!-- end ngRepeat: assert in asserts -->
</div><!-- end ngIf: singlePageAsserts.length > 0 -->

  <!-- ngIf: singlePageAsserts.length === 0 && opt.editable -->

</div><!-- end ngIf: rootHide[critHide] || !opt.collapses -->
</div><!-- end ngIf: shouldCritRender(critSpec) --><!-- end ngRepeat: critSpec in g.successcriteria -->
    </div><!-- end ngRepeat: g in p.guidelines -->

  </div><!-- end ngRepeat: p in principles -->
</div></div>

  <h2 class="ng-binding">Sample of audited web pages</h2>
  <!-- ngInclude: --><div data-ng-include="" data-src="'views/report/sample.html'" class="ng-scope"><ul class="sample_narrow list-unstyled ng-scope">
  <!-- ngRepeat: page in filledPages() --><li data-ng-repeat="page in filledPages()" class="row ng-scope">
    <span class="col-sm-1"></span>
    <span class="col-sm-3 ng-binding">
      Home page&nbsp;
    </span>
    <span class="col-sm-7 ng-binding" data-ng-bind-html="page.description | linky:'_blank'"><a target="_blank" href="https://gcp.caprihealthcare.co.uk/">https://gcp.caprihealthcare.co.uk/</a></span>
    <span class="col-sm-1"></span>
  </li><!-- end ngRepeat: page in filledPages() --><li data-ng-repeat="page in filledPages()" class="row ng-scope">
    <span class="col-sm-1"></span>
    <span class="col-sm-3 ng-binding">
      Login page&nbsp;
    </span>
    <span class="col-sm-7 ng-binding" data-ng-bind-html="page.description | linky:'_blank'"><a target="_blank" href="https://gcp.caprihealthcare.co.uk/index.php?route=login">https://gcp.caprihealthcare.co.uk/index.php?route=login</a></span>
    <span class="col-sm-1"></span>
  </li><!-- end ngRepeat: page in filledPages() --><li data-ng-repeat="page in filledPages()" class="row ng-scope">
    <span class="col-sm-1"></span>
    <span class="col-sm-3 ng-binding">
      Register page&nbsp;
    </span>
    <span class="col-sm-7 ng-binding" data-ng-bind-html="page.description | linky:'_blank'"><a target="_blank" href="https://gcp.caprihealthcare.co.uk/index.php?route=register">https://gcp.caprihealthcare.co.uk/index.php?route=register</a></span>
    <span class="col-sm-1"></span>
  </li><!-- end ngRepeat: page in filledPages() --><li data-ng-repeat="page in filledPages()" class="row ng-scope">
    <span class="col-sm-1"></span>
    <span class="col-sm-3 ng-binding">
      Login page&nbsp;
    </span>
    <span class="col-sm-7 ng-binding" data-ng-bind-html="page.description | linky:'_blank'"><a target="_blank" href="https://gcp.caprihealthcare.co.uk/index.php?route=login">https://gcp.caprihealthcare.co.uk/index.php?route=login</a></span>
    <span class="col-sm-1"></span>
  </li><!-- end ngRepeat: page in filledPages() -->
</ul></div>

  <!-- ngIf: report.specifics.trim() -->

  <h2 class="ng-binding">Related WCAG 2 resources</h2>
  <ul lang="en">
    <li><a target="_blank" href="http://www.w3.org/WAI/standards-guidelines/wcag/">
        Web Content Accessibility Guidelines (WCAG)</a> <br>
        Overview: www.w3.org/WAI/intro/wcag
    </li>
    <li><a target="_blank" href="http://www.w3.org/WAI/WCAG21/quickref/">
        How to Meet WCAG 2.1 Quick Reference</a><br>
        www.w3.org/WAI/WCAG21/quickref/
    </li>
    <li><a target="_blank" href="http://www.w3.org/WAI/eval/conformance">
        WCAG Evaluation Methodology (WCAG-EM)</a><br>
        Overview: www.w3.org/WAI/eval/conformance
    </li>
  </ul>
</div>
    </section>


<?php echo $footer; ?>