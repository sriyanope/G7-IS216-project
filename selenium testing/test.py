
# basic selenium unit testing, will add on more test cases soon

# ignore this file, used selenoum IDE for testing

import unittest
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By


class PythonOrgSearch(unittest.TestCase):
    
    def garbageHandler(self):
        options = webdriver.ChromeOptions()
        options.add_experimental_option("detach", True)
    
    def setUp(self):
        self.driver = webdriver.Chrome()
        

    def test_search_in_python_org(self):
        driver = self.driver
        driver.get("http://13.215.200.46/pages/LogIn.php")
        self.assertIn("Log In", driver.title)
        elem = driver.find_element(By.NAME, "q")
        elem.send_keys("Log In")
        elem.send_keys(Keys.RETURN)
        self.assertNotIn("No results found.", driver.page_source)


    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()



# selenium user testing

# from selenium import webdriver
# from selenium.webdriver.common.keys import Keys
# from selenium.webdriver.common.by import By


# # service = webdriver.ChromeService(executable_path = '/Users/sriyan/Documents/chrome-mac-arm64')
# # driver = webdriver.Chrome(service=service)



# # launch webpage 
# driver = webdriver.Chrome(options=options)
# driver.get("http://13.215.200.46/pages/LogIn.php")


# # checks if title of webpages prints
# print(driver.title)

# finds elements with the letter q in the name attribute
# try:
#     elem = driver.find_element(By.NAME, "q")
# except:
#     # print("No element by that value found. Try again.")
#     elem = driver.find_element(By.NAME, "q")
#     elem.clear()
#     elem.send_keys("pycon")
#     elem.send_keys(Keys.RETURN)
#     assert "No results found." not in driver.page_source

# sending keys, and making 3sure that there are no pre-populated test in the input field 














