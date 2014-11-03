@api.history
Feature: History
  In order view history
  As a visitor
  I want to be able to have access to History REST API

  Scenario: History API is working
    Given Script access api_aisel_history_details route
    Then Content contains valid JSON