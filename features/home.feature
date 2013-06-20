Feature: Homepage
    In order to access to getajob
    As an anonymous user
    I need to be able to access the website's homepage

Scenario: Access homepage
    Given I am on "/index"
    Then I should see "Le but de cette application est de vous permettre"
