@admin.history
Feature: history
  In history to manage history from backend
  As a backend user
  I want to view History events

  Scenario: History list action works
    Given I'm logged in as backend user
    And I visit history list route admin_aisel_history_event_list
    Then I should see list of rows
