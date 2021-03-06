<?php
class CrawlerNotConstraintTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @var Codeception\PHPUnit\Constraint\Crawler
     */
    protected $constraint;

    public function setUp()
    {
        $this->constraint = new Codeception\PHPUnit\Constraint\CrawlerNot('warcraft', '/user');
    }

    public function testEvaluation()
    {
        $nodes = new Symfony\Component\DomCrawler\Crawler("<p>Bye world</p><p>Hello world</p>");
        $this->constraint->evaluate($nodes);
    }

    public function testFailMessageResponse()
    {
        $nodes = new Symfony\Component\DomCrawler\Crawler('<p>Bye world</p><p>Bye warcraft</p>');
        try {
            $this->constraint->evaluate($nodes->filter('p'), 'selector');
        } catch (\PHPUnit\Framework\AssertionFailedError $fail) {
            $this->assertContains("There was 'selector' element on page /user", $fail->getMessage());
            $this->assertNotContains('+ <p>Bye world</p>', $fail->getMessage());
            $this->assertContains('+ <p>Bye warcraft</p>', $fail->getMessage());
            return;
        }
        $this->fail("should have failed, but not");
    }

    public function testFailMessageResponseWhenMoreNodes()
    {
        $html = '';
        for ($i = 0; $i < 15; $i++) {
            $html .= "<p>warcraft $i</p>";
        }
        $nodes = new Symfony\Component\DomCrawler\Crawler($html);
        try {
            $this->constraint->evaluate($nodes->filter('p'), 'selector');
        } catch (\PHPUnit\Framework\AssertionFailedError $fail) {
            $this->assertContains("There was 'selector' element on page /user", $fail->getMessage());
            $this->assertContains('+ <p>warcraft 0</p>', $fail->getMessage());
            $this->assertContains('+ <p>warcraft 14</p>', $fail->getMessage());
            return;
        }
        $this->fail("should have failed, but not");
    }

    public function testFailMessageResponseWithoutUrl()
    {
        $this->constraint = new Codeception\PHPUnit\Constraint\CrawlerNot('warcraft');
        $nodes = new Symfony\Component\DomCrawler\Crawler('<p>Bye world</p><p>Bye warcraft</p>');
        try {
            $this->constraint->evaluate($nodes->filter('p'), 'selector');
        } catch (\PHPUnit\Framework\AssertionFailedError $fail) {
            $this->assertContains("There was 'selector' element", $fail->getMessage());
            $this->assertNotContains("There was 'selector' element on page /user", $fail->getMessage());
            return;
        }
        $this->fail("should have failed, but not");
    }
}
