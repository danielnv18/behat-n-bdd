Feature: blog
  In order to maintain the blog
  As a admin
  I need to be able to edit/delete/create blog post

  @api @javascript
  Scenario: List th blog post
    Given I am logged in as a user with the "administrator" role
    And There is "article" in the site
    And I am on "/admin/content"
    And I wait "10" seconds
    When I select "Article" from "type"
    And I press "Filter"
    And I wait "10" seconds
    Then I should see "Article"