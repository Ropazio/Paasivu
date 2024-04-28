const { Builder, By, Key, until } = require('selenium-webdriver');
const assert = require('assert');
const CHROME_EXE_PATH = '/Users/riina/Documents/Ohjelmointi/Selenium_testing/webdrivers/chromedriver';


describe('Calendar daily notes', () => {
  let driver;

  var doesNoteExist = async (testText) => {
    let noteExists;
    try {
      await driver.findElement(By.xpath("//li[text() = '" + testText + "']"));
      noteExists = true;
    } catch(error) {
      noteExists = false;
    }
    return noteExists;
  }

  var createWeekdays = async () => {
    var weekdayTexts = [];
    var weekdayButtons = [];
    for (let i = 1; i<=7; i++) {
      weekdayTexts.push('day' + i + '_text');
      weekdayButtons.push('day' + i + '_button');
    }
    var weekdays = [];
    weekdays.push(weekdayTexts);
    weekdays.push(weekdayButtons);
    return weekdays;
  }


  beforeEach(async () => {
    // use Chrome
    driver = await new Builder().forBrowser('chrome', executable_path=CHROME_EXE_PATH).build();

    // Go to "Elämänhallinta" and login
    try {
      driver.get("http://localhost:8080/Paasivu_new/login");
      await driver.findElement(By.name('username')).sendKeys('correct username');
      await driver.findElement(By.name('password')).sendKeys('correct password', Key.RETURN);
    } catch(error) {
      throw error;
    }
  });

  describe('Try adding daily calendar note', () => {
    it('should add the note to the the correct day list', async () => {
      var weekdays = await createWeekdays();
      try {
        let testText = await 'test day text box';
        for (let day = 0; day<7; day++) {
          await driver.findElement(By.name(weekdays[0][day])).sendKeys(testText);
          await driver.findElement(By.name(weekdays[1][day])).click();
          let exists = await doesNoteExist(testText);
          await assert.equal(exists, true);
        }
      } catch(error) {
        throw error;
      }
    });
  });

  describe('Try deleting daily calendar note', () => {
    it('should delete the note from the correct day list', async () => {
      try {
        let testText = 'test day text box';
        try {
          await driver.findElement(By.xpath("//li[text() = '" + testText + "']"));
        } catch(error) {
          await driver.findElement(By.name('day0_text')).sendKeys(testText);
          await driver.findElement(By.name('day0_button')).click();
          console.log('Most likely there were no notes beforehand so a note was created.\nThe error should be "NoSuchElementError" and here is the actual error:\n\n', error);
        }
        let i = 0;
        while (i<10) {
          try {
            await driver.findElement(By.xpath("//a[@class='button_link']")).click();
            i =+ 1;
          } catch(error) {
            break;
          }
        }
        let exists = await doesNoteExist(testText);
        assert.equal(exists, false);
      } catch(error) {
        throw error;
      }
    });
  });

  afterEach(async () => driver.quit());

});
