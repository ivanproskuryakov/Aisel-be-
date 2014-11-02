@api.subscription
Feature: Subscription
  In order view subscription
  As a visitor
  I want to be able to have access to Subscription REST API

  Scenario: Subscription API is working
    Given Script access api_aisel_subscription_details route
    Then Content contains valid JSON