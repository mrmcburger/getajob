Feature: Company
    In order to be able to use the website
    As a website user
    I need to be able to do crud operations on company

Scenario: Company Access
    Given I am on "/newcompany"
    Then I should see "Ajouter une entreprise"

Scenario: Add a company
    Given I am on "/newcompany"
    When I fill in "mrmcburger_getajobbundle_companytype_name" with "BehatTest"
    And I fill in "mrmcburger_getajobbundle_companytype_sector" with "BehatTest Sector"
    And I fill in "mrmcburger_getajobbundle_companytype_address" with "BehatTest Address"
    And I press "mrmcburger_getajobbundle_companytype_add_company"
    Then I should see "BehatTest"
    And I should see "BehatTest Sector"
    And I should see "BehatTest Address"

Scenario: Add a company already existing
    Given I am on "/newcompany"
    When I fill in "mrmcburger_getajobbundle_companytype_name" with "BehatTest"
    And I fill in "mrmcburger_getajobbundle_companytype_sector" with "BehatTest Sector"
    And I fill in "mrmcburger_getajobbundle_companytype_address" with "BehatTest Address"
    And I press "mrmcburger_getajobbundle_companytype_add_company"
    Then I should see "Cette valeur est déjà utilisé"

Scenario: Add a company with a bad e-mail address
    Given I am on "/newcompany"
    When I fill in "mrmcburger_getajobbundle_companytype_name" with "Another Behat Test"
    And I fill in "mrmcburger_getajobbundle_companytype_sector" with "BehatTest Sector"
    And I fill in "mrmcburger_getajobbundle_companytype_address" with "BehatTest Address"
    And I fill in "mrmcburger_getajobbundle_companytype_mail" with "FakeAdressMail"
    And I press "mrmcburger_getajobbundle_companytype_add_company"
    Then I should not see "Le but de cette application est de vous permettre"
