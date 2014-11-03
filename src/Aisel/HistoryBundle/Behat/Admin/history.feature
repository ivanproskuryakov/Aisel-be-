@admin.history
Feature: history
  In history to manage historys from backend
  As a backend user
  I want to make CRUD operations for history entities

  Scenario: History list action works
    Given I'm logged in as backend user
    And I visit history list route admin_aisel_history_history_list
    Then I should see list of rows

  Scenario: Edit history action works
    Given I'm logged in as backend user
    And I visit history list route admin_aisel_history_history_list
    Then I click on "Edit" button and see edit form

  Scenario: Show history action works
    Given I'm logged in as backend user
    And I visit history list route admin_aisel_history_history_list
    Then I click on "Show" button and see details

  Scenario: Delete history action works
    Given I'm logged in as backend user
    And I visit history list route admin_aisel_history_history_list
    Then I click on "Delete" button and see confirmation