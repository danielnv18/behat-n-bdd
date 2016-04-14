Feature: Authentication
  In order to gain access to the site management area
  As an admin
  I need to be able to login and logout

  Background:
    Given I am on "/user"
    When I fill in "Username" with "admin"
    And I fill in "Password" with "admin"
    And I press "Log in"

  Scenario: Logging in
    Then I should see "My Account"
    And I should see "Log out"

  @javascript
  Scenario: Logging out
    When I follow "Log out"
    Then I am on the homepage
    And I should see the login box