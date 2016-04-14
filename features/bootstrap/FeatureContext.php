<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Mink\Driver\Selenium2Driver;
use Behat\Behat\Hook\Scope\AfterScenarioScope;
use Drupal\DrupalExtension\Context\RawDrupalContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends RawDrupalContext implements SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I wait :seconds seconds
     */
    public function iWaitSeconds($seconds)
    {
        sleep($seconds);
    }

    /**
     * @Then I should see the login box
     */
    public function iShouldSeeTheLoginBox()
    {
        $this->assertSession()->elementExists('css', '#block-user-login');
    }

    /**
     * Take screen-shot when step fails. Works only with Selenium2Driver.
     *
     * @AfterScenario
     * @param AfterScenarioScope $scope
     */
    public function after(AfterScenarioScope $scope)  {
        $feature_title = str_replace(' ','-',strtolower($scope->getFeature()->getTitle()));
        $scenario_title = str_replace(' ','-',strtolower($scope->getScenario()->getTitle()));
        $path = __DIR__.'../../../screenshots/'.$feature_title.'/'.time().'/'.$scenario_title;

        $driver = $this->getSession()->getDriver();

        if (! $driver instanceof Selenium2Driver) {
            return;
        }

        if (! is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $filename = sprintf(
          '%s_%s_%s.%s',
          date('Ymd') . '-' . date('His'),
          $this->getMinkParameter('browser_name'),
          uniqid('', true),
          'png'
        );

        $this->saveScreenshot($filename,$path);

        print "Created screenshot " . $filename . " at " . $path;
    }

//    /**
//     * @Given There is :type in the site
//     */
//    public function thereAreInTheSite($type)
//    {
//        // Return all nids of nodes of type "page".
//        $nids = db_select('node', 'n')
//          ->fields('n', array('nid'))
//          ->fields('n', array('type'))
//          ->condition('n.type', 'page')
//          ->execute()
//          ->fetchCol();
//
//        if (empty($nids)) {
//            $node = (object) array(
//              'title' => 'Lorem ipmsum '.rand(0,100),
//              'type' => $type,
//              'body' => $this->getRandom()->string(255),
//            );
//            $this->nodeCreate($node);
//        }
//    }



}
