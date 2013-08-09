Feature: Company
    In order to be able to use the website
    As a website user
    I need to be able to do show and modify operations on global criteria

Scenario: Global Criteria Access
    Given I am on "showglobalcriteria"
    Then I should see "Mes critères de sélection"

Scenario: Modify Global Criteria
    Given I am on "/modifyglobalcriteria"
    And I fill in "mrmcburger_getajobbundle_globalcriteriatype_displacement" with "1"
    And I fill in "mrmcburger_getajobbundle_globalcriteriatype_celebrity" with "6"
    And I fill in "mrmcburger_getajobbundle_globalcriteriatype_missionInterest" with "7"
    And I fill in "mrmcburger_getajobbundle_globalcriteriatype_salaryExpectation" with "8"
    And I fill in "mrmcburger_getajobbundle_globalcriteriatype_workConditions" with "3"
    And I fill in "mrmcburger_getajobbundle_globalcriteriatype_evolutionPossibilities" with "2"
    And I press "mrmcburger_getajobbundle_globalcriteriatype_modify_globalcriteria"
    Then I should see "1"
    And I should see "6"
    And I should see "7"
    And I should see "8"
    And I should see "3"
    And I should see "2"
