Feature: blog
  In order to maintain the blog
  As a admin
  I need to be able to edit/delete/create blog post

  @javascript
  Scenario: Edit a blog
    Given I am logged in as "administrator"
    And I am viewing an "article" with the title "Lorem impsum"
    And I wait "8" seconds
    When I click "edit"
    And I fill in "Title" with "Test."
    And I press "Save"
    Then I should see "Test."
    And I wait "8" seconds

#  @javascript
#  Scenario: List th blog post
#    Given I am logged in as a user with the "administrator" role
#    And There is "article" in the site
#    And I am on "/admin/content"
#    And I wait "8" seconds
#    When I select "Article" from "type"
#    And I press "Filter"
#    And I wait "8" seconds
#    Then I should see "Article"