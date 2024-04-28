const { Builder, By, Key, until } = require('selenium-webdriver');
const assert = require('assert');
const CHROME_EXE_PATH = '/Users/riina/Documents/Ohjelmointi/Selenium_testing/webdrivers/chromedriver';


describe('Navi subheadline links', () => {
  let driver;
  let subheadline;
  let linkAddress;

  var testLink = async (subheadline, linkAddress) => {
    try {
      await driver.findElement(By.linkText(subheadline)).click();
      let actualUrl = await driver.getCurrentUrl();
      let expectedUrl = linkAddress;
      assert.equal(expectedUrl, actualUrl);
    } catch(error) {
      throw error;
    }
  }


  beforeEach(async () => {
    // use Chrome
    driver = await new Builder().forBrowser('chrome', executable_path=CHROME_EXE_PATH).build();

    // Go to ropaz.dev
    driver.get("http://localhost:8080/Paasivu_new/");
  });

  // "VERKKOPROJEKTIT"
  describe('Links under "Verkkoprojektit"', () => {

    describe('Try pressing "Pekkaspäivät"', () => {
      it('should go to "Pekkaspäivät" in "Verkkoprojektit"', async () => {
        await testLink('Pekkaspäivät', "http://localhost:8080/Paasivu_new/coding_projects#pekkaspaivat");
      });
    });
  
    describe('Try pressing "Nettikasvio"', () => {
      it('should go to "Nettikasvio" in "Verkkoprojektit"', async () => {
        await testLink('Nettikasvio', "http://localhost:8080/Paasivu_new/coding_projects#nettikasvio");
      });
    });
  
    describe('Try pressing "Joulutoivelista"', () => {
      it('should go to "Joulutoivelista" in "Verkkoprojektit"', async () => {
        await testLink('Joulutoivelista', "http://localhost:8080/Paasivu_new/coding_projects#joulutoivelista");
      });
    });
  });

  // "ASKARTELUPROJEKTIT"
  describe('Links under "Askarteluprojektit"', () => {

    describe('Try pressing "Virkatut hahmot"', () => {
      it('should go to "Virkatut hahmot" in "Askarteluprojektit"', async () => {
        await testLink('Virkatut hahmot', "http://localhost:8080/Paasivu_new/hobby_projects#crochet");
      });
    });
  
    describe('Try pressing "Tekstiilityöt"', () => {
      it('should go to "Tekstiilityöt" in "Askarteluprojektit"', async () => {
        await testLink('Tekstiilityöt', "http://localhost:8080/Paasivu_new/hobby_projects#textile");
      });
    });
  
    describe('Try pressing "Tekniset työt"', () => {
      it('should go to "Tekniset työt" in "Askarteluprojektit"', async () => {
        await testLink('Tekniset työt', "http://localhost:8080/Paasivu_new/hobby_projects#tech");
      });
    });
  
    describe('Try pressing "Muut käsityöt"', () => {
      it('should go to "TMuut käsityöt" in "Askarteluprojektit"', async () => {
        await testLink('Muut käsityöt', "http://localhost:8080/Paasivu_new/hobby_projects#other");
      });
    });
  });

  afterEach(async () => driver.quit());

});
