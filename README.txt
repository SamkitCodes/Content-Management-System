Description:
This is for a CMS (content management system) for artists. This platform allow arists to signup and showcase, publish and manage their profile easily. By 
this, they can potentially be contacted b people who want to buy any of their work. This is a online non-profit site which aims to help rising artists to 
profit from their art.

index.php: 
This is the landing page of the website which have options for people to signup. It also showcase featured theme and artist. To make this page as desired I 
had removed many sections and changed most of the content of the page. Also, I had to change can link the navigation bar as required.

about.php: 
This page highlights the aim of this website. It has a section for our story to tell other about the vision about this website. To make this page as desired 
I had removed many sections and changed most of the content of the page. Also, I had to change can link the navigation bar as required.

artists.php: 
This page highlights the artists who use this website to showcase their talent. To make this page as desired I changed content and navigation bar of the website.
Also, I removed everything in main area of the page except the row of round image and their headings. Then I used php to fill the page using database files and then made
names as link.

collections_T.php: 
This page highlights the themes of our site so that the user can choose anyone that best represents them. To make this page as desired I changed content and 
navigation bar of the website. Also, I removed everything in main area of the page except the cards. I also changed many elements of the cards to achieve the 
desired look for the page. Then I also used php to fill the page using database file and made cards as links.

signin.php: 
This page is for users to signin to our website and use our services using their username and password. To make this page as desired I changed content and navigation 
bar of the website. Also, I removed most of the content of the page including many elements of the form to get the desired look. Also I changed the text of the remaing 
form inputs for the site to username and password. Sessions are used to keep user logged in and the passwords are unhashed beforre getting compared.

themes.php:
This page highlights a specific theme of our site so that the user can choose anyone that best represents them. To make this page as desired I changed content and 
navigation bar of the website. Also, I used php to read from the database file and display the art of a particular theme used. I also changed many elements of the cards to 
achieve the desired look for the page.

aboutArtist.php:
This page displays information and art of an individual artist so that user can explore about a particular artist. To make this page as desired I changed content and 
navigation bar of the website. Also, I used php to read from the database file and display the art and description of an individual artist used.  I also displayed number of 
art for every artist before the artwork itself. 

post.php:
This page is for artists to post to our website and use our services. To make this page as desired I changed content and navigation bar of the website. Also, I added
sections for the form and used to submit data by user. Then I update the data entered by user in the database file using php and session. Also a user can submit a art in a theme which
does not exists before.

createAccount.php:
Takes the user's information and make their account. Check and only allows the user to select a unique username and the passowrd is hashed. Once the user signs up then user is automatically logged in.

signout.php:
Destroys the session when the user logs out.


Changes form A1:
1. Corrected the signin page
2. Corrected the art by you link 
3. Cited bootstrap

Changes from A2
1. Removed extra post index
2. Submit sutton match template
3. Image path added correctly
4. “Theme Collection” reads “Collections by Themes”

Changes from A3
1. Now the artist can add to a theme in which they have never contributed to before

Changes from A4:
1. $conn->close() on line 187 is inside the if statement
2. Header is displaying “Create a new account” instead of “Sign In” on createAccount.php
3. Error message appears after the submit button
4. Signout is available on post page 
5. Added checks for empty/missing inputs


Citations:

1. Lorem Ipsum. (n.d.). Retrieved Feburary 26, 2023, from http://www.lipsum.com. 
2. Start Bootstrap. (n.d.). Modern Business. Retrieved Feburary 26, 2023, from https://startbootstrap.com/previews/modern-business.
3. All images used are stock images from Microsoft PowerPoint 2023.

















