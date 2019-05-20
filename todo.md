# What todo next on DinoBits.com

* New theme. With separate splited CSS
  * Allow themes to be swithible (store in cookies)  
* <strike>Add SSL (Let's encrypt, certbot)</strike>
* Add basic user registraton
* Add user dashboard. Cabinet (settings and stuff).
* Add simple databases for giveaway list
* Add game posting/pushing.
* Score boards for games and top viewers
* Integrate some API (twitch user integration?)

* Add custom twitch overlay or chat games (for additionnal points)

Descriptions

GiveAway - group of products that can be given actively

Product - Is a game, application or any other stuff that can be give to someone else as a giveaway.

Idea Nr1:

Product - static
Active Products - real givable products. Consists of key code, and other stuff
GiveAway - List of Active products.


## API and custom stuff integration

* Discord
* Twitch
  * ChatBow
  * Automated GiveAways
  * ChatBot data sync between web and chat
* Youtube


## Additional stuff to show
* CI/CD (custom made and via GitLab)

## Database
Mysql

* User
  * type/is activated. for linking with twitch

* GiveAway ???
  * id
  * Who provided the game
  * Platform (from where the game came or go) (Steam, Origin etc.)
  * Who won the game ->user One
  * Type (game, program or something else)
  * Name (short name, long name)
  * price (in CRISIS tokens or in Win tokenes)
  * Availability (if product is claimed by someone), count how many left (Summ of equal products)
  * is active
  * is enable
  * Probability of my giving this product away
  * creation date
  * update date
* Product (Game, Application)
  * id
  * name
  * type (->product)
  * platforms (Steam-linux, Steam-windows)
  * description
* Platform
  * id
  * name
  * Description
  <!-- * is active -->
* ProductType (game, application, book)
  * id
  * name
  * description
* Product Inventory
  * id
  * product
  * provider
  * url - link to product page (for provider)
  * platform (null)
  * code (claimable code, when provided to someone, he can claim it) (null)
  * claimed by -> user
  * comment (about what, when, why etc)
  * created_at
  * updated_at
  * claimed_at
  * is_active
  * is_enabled
  * active + enabled (is available)
* Provider
  * id
  * type (provider type) User/ Shop/ 
  * url
  * description
  * comment


* OS ?

* ChatBot (with data)
* Games (phase and others)
* Posts/blog (news)


For twith integration we need some URL