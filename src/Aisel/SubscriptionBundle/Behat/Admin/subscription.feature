@admin.subscription
Feature: subscription
  In subscription to manage subscriptions from backend
  As a backend user
  I want to make CRUD operations for subscription entities

  Scenario: Subscription list action works
    Given I'm logged in as backend user
    And I visit subscription list route admin_aisel_subscription_subscription_list
    Then I should see list of rows

  Scenario: Edit subscription action works
    Given I'm logged in as backend user
    And I visit subscription list route admin_aisel_subscription_subscription_list
    Then I click on "Edit" button and see edit form

  Scenario: Show subscription action works
    Given I'm logged in as backend user
    And I visit subscription list route admin_aisel_subscription_subscription_list
    Then I click on "Show" button and see details

  Scenario: Delete subscription action works
    Given I'm logged in as backend user
    And I visit subscription list route admin_aisel_subscription_subscription_list
    Then I click on "Delete" button and see confirmation