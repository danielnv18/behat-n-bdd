Feature: Authentication
  In order to gain access to the site management area
  As an admin
  I need to be able to login and logout

  Scenario: Logging in
    Given I am on "/user"
    When I fill in "Username" with "admin"
    And I fill in "Password" with "admin"
    And I press "Log in"
    Then I should see "My Account"
    And I should see "Log out"

  Scenario: Logging out
    Given I am on "/user"
    When I fill in "Username" with "admin"
    And I fill in "Password" with "admin"
    And I press "Log in"
    Then I click "Log out"