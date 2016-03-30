Feature: Homepage
  Homepage displays successfully.

  Scenario: Check the homepage.
    Given I am an anonymous user
    When I am on the homepage
    Then the response status code should be 200

  Scenario: Check the admin page access denied.
    Given I am an anonymous user
    When I am on "admin"
    Then the response status code should be 403
