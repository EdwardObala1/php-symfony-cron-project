## Things I have learnt how to do

#### Routing in Symfony

- Routes can either be configured in YAML, PHP, XML or using attributes. All formats perfrom the same and provide the same features.

![Routing in controller](../../assets/images/Screenshot%202023-09-23%20at%2015.59.35.png)

-  The configuration defines a route called blog_list that matches when the user calls the url.

</br>

**Caution** If you define multiple PHP classes in the same file, Symfony only loads the routes of the first class, ignoring all the other routes.

- debug routes with `php bin/console debug:router`
- pass the name of a route to get all its details `php bin/console debug:router route_name`

- `php bin/console router:match /lucky/number/8` is useful to find out why some URL is not executing the controller action that you expect:

#### Route Parameters

![Adding parametes in Route annotation](../../assets/images/Screenshot%202023-09-23%20at%2016.29.28.png)

- The name of the variable part ({slug} in this example) is used to create a PHP variable where that route content is stored and passed to the controller. If a user visits the /blog/my-first-post URL, Symfony executes the show() method in the BlogController class and passes a $slug = 'my-first-post' argument to the show() method.

#### Parameter Validation

- If your application has a blog_show route (URL: /blog/{slug}) and a blog_list route (URL: /blog/{page}). Given that route parameters accept any value, there's no way to differentiate both routes.

- If the user requests /blog/my-first-post, both routes will match and Symfony will use the route which was defined first. To fix this, add some validation to the {page} parameter using the requirements option:

![Adding parametes in Route annotation](../../assets/images/Screenshot%202023-09-23%20at%2016.33.49.png)

- \d+ is a regular expression that matches a digit of any length


**Note** How to handle default parameters


## Controllers

- Symfony comes packed with a lot of useful classes and functionalities, called services. These are used for rendering templates, sending emails, querying the database and any other "work" you can think of.

##### Dealing with the request object

- What if you need to read query parameters, grab a request header or get access to an uploaded file? That information is stored in Symfony's Request object. To access it in your controller, add it as an argument and type-hint it with the Request class:


![Adding parametes in Route annotation](../../assets/images/Screenshot%202023-09-23%20at%2023.59.16.png)

#### Return JSON
- To return JSON from a controller, use the json() helper method. This returns a JsonResponse object that encodes the data automatically:

![Adding parametes in Route annotation](../../assets/images/Screenshot%202023-09-24%20at%2000.16.26.png)