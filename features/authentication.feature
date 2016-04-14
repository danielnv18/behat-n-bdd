Feature: Authentication
  In order to gain access to the site management area
  As an admin
  I need to be able to login and logout

  @javascript
  Scenario: Logging in
    Given I am on "/user"
    And I wait "2" seconds
    When I fill in "Username" with "admin"
    And I wait "1" seconds
    And I fill in "Password" with "admin"
    And I wait "2" seconds
    And I press "Log in"
    Then I should see "My Account"
    And I should see "Log out"