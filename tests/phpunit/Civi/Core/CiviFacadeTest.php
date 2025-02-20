<?php
namespace Civi\Core;

class CiviFacadeTest extends \CiviUnitTestCase {

  protected $origSetting;

  protected $mandates;

  protected function setUp(): void {
    $this->origSetting = $GLOBALS['civicrm_setting'];

    parent::setUp();
    $this->useTransaction(TRUE);

    $this->mandates = [];
  }

  public function tearDown(): void {
    $GLOBALS['civicrm_setting'] = $this->origSetting;
    parent::tearDown();
  }

  /**
   * Get the the settingsbag for a logged-in user.
   */
  public function testContactSettings_loggedIn() {
    $this->createLoggedInUser();
    $settingsBag = \Civi::contactSettings();
    $settingsBag->set('foo', 'bar');
    $this->assertEquals('bar', $settingsBag->get('foo'));
  }

  /**
   * Anonymous users don't have a SettingsBag.
   */
  public function testContactSettings_anonFail() {
    $this->expectException(\CRM_Core_Exception::class);
    \Civi::contactSettings();
  }

  /**
   * Get the SettingsBag for a specific user.
   */
  public function testContactSettings_byId() {
    $cid = \CRM_Core_DAO::singleValueQuery('SELECT MIN(id) FROM civicrm_contact');
    $settingsBag = \Civi::contactSettings($cid);
    $settingsBag->set('foo', 'bar');
    $this->assertEquals('bar', $settingsBag->get('foo'));
  }

}
