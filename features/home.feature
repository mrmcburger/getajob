Feature: Homepage
    In order to be able to use the website
    As a website user
    I need to be able to access the homepage

Scenario: Access homepage
    Given I am on "/index"
    Then I should see "Le but de cette application est de vous permettre"
