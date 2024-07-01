CREATE DATABASE hagurash;

USE hagurash;

CREATE TABLE users (
    user_id VARCHAR(100) PRIMARY KEY NOT NULL,
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(100),
    bookmarked BOOLEAN,
    status INT,
    admin BOOLEAN,
    reg_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_user_id (user_id),
    img_src TEXT
);


CREATE TABLE recipes(
id VARCHAR(100) PRIMARY KEY NOT NULL,
title VARCHAR(60),
publisher VARCHAR(60),
source_url TEXT,
image_url TEXT,
ingredients JSON,
servings INT,
cooking_time INT);

CREATE TABLE reviews(
id VARCHAR(100) PRIMARY KEY NOT NULL,
name VARCHAR(30),
title VARCHAR(30),
img_url TEXT,
review TEXT
);

CREATE TABLE popular_recipes(
id VARCHAR(100) PRIMARY KEY NOT NULL,
title VARCHAR(30),
source_url TEXT,
img_url TEXT
);

CREATE TABLE bookmarks (
  user_id VARCHAR(100) NOT NULL,
  recipe_id VARCHAR(100) NOT NULL,
  PRIMARY KEY (user_id, recipe_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE videos(
id VARCHAR(30) PRIMARY KEY NOT NULL,
src TEXT,
poster_url TEXT,
title VARCHAR (100),
description TEXT,
num_views BIGINT
);

CREATE TABLE comments(
	id VARCHAR(10) PRIMARY KEY NOT NULL,
    name VARCHAR(30),
    gender CHAR,
    email VARCHAR(70),
    messages JSON,
    last_active BIGINT
);
CREATE TABLE replies(
	message_id VARCHAR(10),
  reply TEXT,
  sent_at BIGINT
);

CREATE TABLE ratings(
  user_id VARCHAR(40),
  recipe_id VARCHAR(50),
  recipe_title VARCHAR(50),
  rating INT,
  PRIMARY KEY(user_id,recipe_id)
);
CREATE TABLE views (
	recipe_id VARCHAR(50) PRIMARY KEY,
  recipe_title VARCHAR(60),
  views INT
);






-- SELECT * FROM users;
-- select * from bookmarks;
-- delete from bookmarks;
-- insert into bookmarks values("o0o5hk1s9Wa6nr9Yn1e317",'1d0c6h1e05t6eo8w946r12t3o6');
-- insert into bookmarks values("o0o5hk1s9Wa6nr9Yn1e317",'10c6h1e00ik54612p3');
-- SELECT * FROM recipes WHERE id = '10f6o1a00h5r4c6k1n2i35a9t3';
-- SELECT * FROM videos ORDER BY num_views DESC LIMIT 6;


-- Users -- 
INSERT INTO users (user_id, name, email, password, bookmarked, status, admin) VALUES ('ao5o14dn1ie8','admin','admin@gmail.com','$2y$10$RLxZJ8Wiv4q32d6QrzSFNul/5I0LdQGQ.rUs/q5nkiEnEr2UdHzWO',TRUE,4,TRUE);
INSERT INTO users (user_id, name, email, password, bookmarked, status, admin) VALUES ('ao5o14dy1ie8','Yonatan Alamrew','yoniala@gmail.com','$2y$10$RLxZJ8Wiv4q32d6QrzSFNul/5I0LdQGQ.rUs/q5nkiEnEr2UdHzWO',TRUE,0,FALSE);
INSERT INTO users (user_id, name, email, password, bookmarked, status, admin) VALUES ('bo5o14dn1iy8','Yohanna Betsiha','yohannab@gmail.com','$2y$10$RLxZJ8Wiv4q32d6QrzSFNul/5I0LdQGQ.rUs/q5nkiEnEr2UdHzWO',FALSE,0,FALSE);
INSERT INTO users (user_id, name, email, password, bookmarked, status, admin) VALUES ('to5o14dn1ig8','Temesgen Getye','teme@gmail.com','$2y$10$RLxZJ8Wiv4q32d6QrzSFNul/5I0LdQGQ.rUs/q5nkiEnEr2UdHzWO',TRUE,0,FALSE);
INSERT INTO users (user_id, name, email, password, bookmarked, status, admin) VALUES ('a5n5o4df1ie8','Yonatan Ashenafi','yoniclef@gmail.com','$2y$10$RLxZJ8Wiv4q32d6QrzSFNul/5I0LdQGQ.rUs/q5nkiEnEr2UdHzWO',FALSE,0,FALSE);
INSERT INTO users (user_id, name, email, password, bookmarked, status, admin) VALUES ('y6o5o14n1iw8','Yonas Workneh','yonasdegefu@gmail.com','$2y$10$RLxZJ8Wiv4q32d6QrzSFNul/5I0LdQGQ.rUs/q5nkiEnEr2UdHzWO',FALSE,0,FALSE);
INSERT INTO users (user_id, name, email, password, bookmarked, status, admin) VALUES ('y6o5o14n1iM8','Yohannes Messay','yohannis@gmail.com','$2y$10$RLxZJ8Wiv4q32d6QrzSFNul/5I0LdQGQ.rUs/q5nkiEnEr2UdHzWO',TRUE,0,FALSE);

-- Popular Recipes -- 
INSERT INTO popular_recipes VALUES('10i6s1e00t54612b3','Tibs','http://www.gourmetcubicle.com/blog/hannas-ethiopian-beef-tibs','https://spicebreeze.com/wp-content/uploads/2022/09/Ethiopian-Tibs.jpg');
INSERT INTO popular_recipes VALUES('10o6s1w00t5r4o61o2d3','Doro-wot','https://mykitchenlittle.com/2023/11/26/ethiopian-doro-wat-recipe/','https://www.eggs.ca/assets/RecipeThumbs/EFC-doro-wat-hero-1280x720.jpg');
INSERT INTO popular_recipes VALUES('10c6s1r00b5r4o61n2a35a9r3','Spaghetti-carbonara','https://www.bbcgoodfood.com/recipes/ultimate-spaghetti-carbonara-recipe','https://images.immediate.co.uk/production/volatile/sites/30/2013/05/spaghetti-carbonara-382837d.jpg?quality=90&webp=true&resize=300,272');
INSERT INTO popular_recipes VALUES('10k6o1a00h5r4c6h1n2e35a9c3','Choclate-cake','https://www.bbcgoodfood.com/recipes/ultimate-chocolate-cake','https://bluebowlrecipes.com/wp-content/uploads/2023/08/chocolate-truffle-cake-8844.jpg');
INSERT INTO popular_recipes VALUES('161o0p5r4t6i12a35t9s3','Tiropitas','https://thestoriedrecipe.com/recipe-cards/tiropitas-greek-cheese-pies-in-filo-pastry/','https://i0.wp.com/thestoriedrecipe.com/wp-content/uploads/2019/11/Greek-Cheese-Pies-1035.jpg?resize=530%2C400&ssl=1');
INSERT INTO popular_recipes VALUES('10z6o1z00h5a4c1i3a9p3','Pizza','https://www.loveandlemons.com/homemade-pizza/','https://upload.wikimedia.org/wikipedia/commons/9/91/Pizza-3007395.jpg');
INSERT INTO popular_recipes VALUES('10k61a00t5e4a6h1n2e35a9s3','Steak','https://natashaskitchen.com/pan-seared-steak/','https://www.foodandwine.com/thmb/nesQwmMJ6zA4Fb0TtAThMwdn56g=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/steakhouse-style-rib-eyes-ft-recipe1118-235f4532bcf948efa82aab8065bb98d8.jpg');
INSERT INTO popular_recipes VALUES('10f6o1a00h5r4c6k1n2i35a9t3','Kitfo','https://www.foodnetwork.com/recipes/kitfo-12239304','https://www.allrecipes.com/thmb/I8QL8pshGJY2kJDzr7u-UfU9zk0=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/GettyImages-636369362_ethiopian-kitfo_gettyimages_alleko-2000-31e73b5b3aa0479eb15a9d17ef063c33.jpg');
INSERT INTO popular_recipes VALUES('10e6o1g00h5r4c6r1n2e35b9u3','Burger','https://www.recipetineats.com/cheeseburger-recipe/','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTalCPMNVRNsBc1LdtiVoDcFuzH8bYCzrqT5w&usqp=CAU');

-- Testimonials --
INSERT INTO reviews VALUES('1f0c6i1e00ik54612R3','Marcus Samuelson','chef',"https://i0.wp.com/andershusa.com/wp-content/uploads/2019/08/meet-marcus-samuelsson-swedish-ethiopian-american-celebrity-chef-red-rooster-restaurant-harlem-new-york-usa-kitchen-and-table-clarion-hotel-oslo-norway-2019-4.jpg?fit=1200%2C800&ssl=1","As a professional chef, I highly recommend Hagurash for its extensive collection of recipes. It has greatly influenced the culinary industry and brought a new bond between customers and the culinary world.");
INSERT INTO reviews VALUES('1ysc6i1e00ik54612g3','Yohannis Gebereyesus','chef',"https://www.ethiosports.com/wp-content/uploads/2017/06/Yohanis-Hailemariam.jpg","I consider Hagurash a pragmatic push in the culinary culture of Ethiopia... Their quality is unmatched, their diversity coupled with the great platform they created is astonishing.");
INSERT INTO reviews VALUES('1r0e6z1o9n0e9k54612h3','Henok Zerihun','chef',"https://media.licdn.com/dms/image/C4E03AQGhMg96m1Wjpg/profile-displayphoto-shrink_800_800/0/1617569183394?e=2147483647&v=beta&t=ptShtcrH7b8ujluC21f1dUheNtbnbQswoKbwY99SqdQ","Hagurash has become my go-to when I need inspirations to create new cuisines. Their recipes offer multitudes of categories and the user experience is unparalleled.");
INSERT INTO reviews VALUES('1o0c6r1e0d9r5m6a2g3','Gordon Ramsay','chef',"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeZkis0q41D2tXxbKH1Ism9AZb-q3XSqGIMA18J0FxGg&s","I have spent almost 20 years in the culinary world and we have never had such an authentic and interactive platform where we could not just create but also enjoy what others have created.");
INSERT INTO reviews VALUES('1m0c6r1a00ik54612s3','Samrawit Teshome','',"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWV4WBazhGph39EXnT3Yem_Vbqo3i17GBKIQHaUnXWBg&s","As a stay at home mother, I really enjoy Hagurash for its rigourous collection of recipes. It has helped me a lot in the kitchen and even beyond I am now even considering making my own recipes and posting them on hagurash.");
INSERT INTO reviews VALUES('1c2fc6h1e0n5l5e46e1R3','Chen Lee','chef',"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_P0pZR04Va6o6WYvJubjFoQa5wwlH_EhS08qiVnlyzg&s","It has not been long since I have joined the industry as a professional but I don't think there is any platform out there that out-match what Hagurash is offering.");
INSERT INTO reviews VALUES('1r2eg6n8f1e0n5l5k4i6e1m3','Mike Grenfield','',"https://cdn.shopify.com/s/files/1/2289/1873/articles/Cook-at-Home-1.jpg?v=1668612979","I am no proffessional I do cooking for my family and myself but the experiences I have had with hagurash is honestly impeccable.");

-- Recipes --
INSERT INTO recipes VALUES('10c6h1e00ik54612p3','chechebsa','hagurash','https://tarasmulticulturaltable.com/chechebsa-ethiopian-torn-flatbread/','https://tarasmulticulturaltable.com/wp-content/uploads/2023/04/Chechebsa-Ethiopian-Torn-Flatbread-Breakfast-5-of-7-1024x683.jpg','[{"unit":"tbsp","description":"butter","quantity":1},{"unit":"kg","description":"flour","quantity":1},{"unit":"tbsp","description":"salt","quantity":1},{"unit":"tbsp","description":"pepper","quantity":1}]', 4,90);
INSERT INTO recipes VALUES('1d0c6h1e05t6eo8w946r12t3o6','Ethiopian doro-wot','hagurash','https://mykitchenlittle.com/2023/11/26/ethiopian-doro-wat-recipe/','https://i0.wp.com/mykitchenlittle.com/wp-content/uploads/2023/11/Doro-Wat-Recipe-Ethiopian-Spiced-Chicken-Stew-8-scaled.jpg?resize=683%2C1024&ssl=1','[{"unit":"tbsp","description":"butter","quantity":1},{"unit":"kg","description":"flour","quantity":1},{"unit":"tbsp","description":"salt","quantity":1},{"unit":"tbsp","description":"pepper","quantity":1}]', 4,90);


-- Videos --
INSERT INTO videos VALUES ('Cx6O1_E-Je8',"https://www.youtube.com/embed/Cx6O1_E-Je8",'https://i.ytimg.com/vi/Cx6O1_E-Je8/maxresdefault.jpg','Africa EU  ETH Chef Yohanis Cooking Series EP 2',"This cooking series features renowned Ethiopian chef Yohanis as he showcases the vibrant, flavorful cuisine of his home country. In each episode, Chef Yohanis takes viewers on a culinary journey, sharing insights into traditional African and Ethiopian cooking techniques, ingredients, and recipes.Through Chef Yohanis' expert guidance, the series aims to introduce audiences to the diverse and complex flavors of Ethiopian fare. From classic dishes like injera, doro wot, and kitfo, to innovative fusions that blend African and European influences, every episode promises to be a mouthwatering exploration of this rich culinary heritage.",0);
INSERT INTO videos VALUES ('m5Kn9WmOCrw',"https://www.youtube.com/embed/m5Kn9WmOCrw",'https://i.ytimg.com/vi/m5Kn9WmOCrw/maxresdefault.jpg','Easy Amazing Shakshuka Recipe',"Perfect for breakfast or any other meal of the day, Shakshuka is an easy and healthy recipe that comes together quickly on the stovetop. This recipe features a mixture of tomatoes, bell peppers, onions, and garlic simmered together with pockets of gently poached eggs. While it may look complicated, you can make a restaurant-quality version at home in a few simple steps.",0);
INSERT INTO videos VALUES ('mhDJNfV7hjk',"https://www.youtube.com/embed/mhDJNfV7hjk",'https://i.ytimg.com/vi/mhDJNfV7hjk/maxresdefault.jpg','Quick &amp; Easy Recipes With Gordon Ramsay',"In this captivating video series, world-renowned chef Gordon Ramsay shares a collection of his signature quick and easy recipes. Known for his culinary expertise and high standards, Ramsay demonstrates how to create mouthwatering meals without compromising on flavor or technique.From simple weeknight dinners to impressive last-minute appetizers, each episode guides viewers through Ramsay's step-by-step approach to preparing delicious dishes in a time-efficient manner.",0);
INSERT INTO videos VALUES ('ulhRORJpuBM',"https://www.youtube.com/embed/ulhRORJpuBM",'https://i.ytimg.com/vi/ulhRORJpuBM/maxresdefault.jpg','Gordon Ramsay Makes an All American Burge',"World-renowned chef Gordon Ramsay puts his unique spin on the quintessential All-American burger in this mouth-watering recipe. Starting with high-quality beef, Ramsay masterfully seasons and grills the patty to burger perfection. He then layers on melted cheddar cheese, crisp lettuce, juicy tomatoes, and a tangy house-made sauce, all nestled between a soft, toasted brioche bun.Ramsay's attention to detail and culinary expertise elevate this classic burger, creating a harmonious balance of flavors and textures. From the sear on the patty to the perfectly proportioned toppings, every component works in symphony to deliver an immensely satisfying burger experience",0);
INSERT INTO videos VALUES ('YDB4Vg_jLSg',"https://www.youtube.com/embed/YDB4Vg_jLSg",'https://i.ytimg.com/vi/YDB4Vg_jLSg/maxresdefault.jpg','Kamado Joe | The Perfect Steak',"Elevate your steak night with this recipe for a perfectly cooked and flavorful grilled steak. Carefully seasoned with a blend of herbs and spices, the steak is seared to lock in the juices, resulting in a tender and succulent center. Whether you're a steak aficionado or looking to impress your guests, this grilled steak dish is sure to satisfy your cravings for a mouthwatering, restaurant-quality meal in the comfort of your own home.",0);
INSERT INTO videos VALUES ('-xFR_daRIyw',"https://www.youtube.com/embed/-xFR_daRIyw",'https://i.ytimg.com/vi/-xFR_daRIyw/maxresdefault.jpg','Get a Taste Of Ethiopia: Kitfo with Woinee Mariam | Food Network',"Uncover the secrets of the beloved Ethiopian dish, Kitfo, a delectable beef tartare made with finely minced raw beef marinated in a unique blend of spices, including the signature berbere seasoning. The result is a mouthwatering, spicy, and aromatic delicacy that is often served alongside injera, a spongy flatbread. Kitfo is traditionally enjoyed either lightly cooked or completely raw, allowing the pure, rich flavors of the beef to shine. Prepare to tantalize your taste buds as we guide you through the process of creating an authentic Kitfo dish in your own kitchen, so you can savor the captivating flavors of Ethiopian cuisine. Get ready to embark on a culinary adventure and uncover the secrets of this traditional Ethiopian specialty.",0);
INSERT INTO videos VALUES ('vI5w-fK25w4',"https://www.youtube.com/embed/vI5w-fK25w4",'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1tCWlOs99PU_QmP8-7q8nQW38QirV0_80O48uZjNa3w&s','The Best Chocolate Cake Recipe',"Indulge in the ultimate chocolate experience with this recipe for a decadent and moist chocolate cake. Made with premium cocoa powder and rich chocolate, this cake boasts a deep, intense chocolate flavor in every bite. The addition of butter, eggs, and a touch of coffee creates a remarkably tender and rich crumb that melts in your mouth. Topped with a silky smooth chocolate buttercream frosting, this chocolate cake is the perfect dessert for any chocolate lover. Whether you're celebrating a special occasion or simply craving a delectable treat, this homemade chocolate cake is sure to satisfy your sweet tooth and leave you wanting more.",0);
INSERT INTO videos VALUES ('iU3G37y-12M',"https://www.youtube.com/embed/iU3G37y-12M",'https://dwgyu36up6iuz.cloudfront.net/heru80fdn/image/upload/c_fill,d_placeholder_epicurious.png,fl_progressive,g_face,h_1080,q_80,w_1920/v1695758470/epicurious_passport-kitchen-how-an-ethiopian-chef-makes-doro-tibs-chicken-stir-fry.jpg','How to Cook Beef Tibs (Ethiopian Food) || የጥብስ አሰራር',"In this video, we'll take you on a delicious journey to explore the vibrant flavors of Ethiopia with an authentic recipe for Ethiopian Tibs. Tender cubes of beef are sautéed with a blend of aromatic spices, onions, and peppers, creating a robust and flavorful meal. The addition of berbere, a signature Ethiopian spice mixture, lends a distinctive smoky and slightly spicy note to the dish. Typically served with injera, a spongy flatbread, Ethiopian Tibs is a beloved staple that showcases the country's rich gastronomic heritage. This simple, yet incredibly satisfying dish is a must-try for anyone exploring the diverse and captivating flavors of Ethiopian cuisine. Join us as we uncover the secrets of this traditional and mouthwatering beef dish!",0);
INSERT INTO videos VALUES ('rR9wq5uN_q8',"https://www.youtube.com/embed/rR9wq5uN_q8",'https://i.pinimg.com/736x/95/cc/a4/95cca43596976ee7abf6f72965676626.jpg','Gordon Ramsay&#39;s Flavorful Salmon And Sides',"Elevate your seafood game with this mouthwatering recipe for herb-crusted salmon. Tender, flaky salmon fillets are coated in a vibrant herb and breadcrumb mixture, creating a delicious contrast of textures and flavors. The simple yet sophisticated preparation allows the natural sweetness of the salmon to shine, while the crispy herb crust adds a delightful crunch in every bite. Serve this restaurant-worthy salmon dish alongside roasted vegetables or a fresh salad for a complete and nutritious meal that's sure to impress.",0);
INSERT INTO videos VALUES ('SMPfiD6hOlQ',"https://www.youtube.com/embed/SMPfiD6hOlQ",'https://i.ytimg.com/vi/SMPfiD6hOlQ/maxresdefault.jpg','4 Levels of Frittata: Amateur to Food Scientist | Epicurious',"Start your day off right with this nourishing and flavor-packed veggie frittata. Loaded with fresh vegetables, this easy-to-make egg dish is a wholesome and satisfying meal that can be enjoyed for breakfast, brunch, or even dinner. The combination of fluffy eggs, sautéed veggies, and melted cheese creates a dish that's both nutritious and delicious. Customize the frittata with your favorite seasonal produce for a truly versatile and healthy option the whole family will love.",0);
INSERT INTO videos VALUES ('HdDwqG3OqY4',"https://www.youtube.com/embed/HdDwqG3OqY4",'https://i.ytimg.com/vi/HdDwqG3OqY4/sddefault.jpg','$404 vs $14 Pancakes: Pro Chef &amp; Home Cook Swap Ingredients | Epicurious',"In this video, we put pancake-making skills to the test as a professional chef goes head-to-head with a home cook. The pro chef demonstrates expert techniques to create light and fluffy pancakes with a beautifully golden exterior. Their pancakes are perfectly portioned, evenly cooked, and elevated with creative flavor combinations.In contrast, the home chef takes a more casual approach, showcasing pancakes that are homey and comforting. While they may not have the picture-perfect presentation of the pro's pancakes, the home cook's version is still delicious, with a satisfying texture and classic flavors.",0);
INSERT INTO videos VALUES ('ZPQMbbsjXiQ',"https://www.youtube.com/embed/ZPQMbbsjXiQ",'https://laughingsquid.com/wp-content/uploads/2024/01/56-Grilled-Cheese.jpeg','56 Grilled Cheeses: Which One is Best? | Epicurious',"In this epic grilled cheese showdown, we put 56 unique and creative versions of the classic sandwich to the test. From traditional cheddar to unexpected flavor combinations, our team of cheese connoisseurs samples and evaluates each grilled cheese, judging them on criteria like texture, ooze-factor, and overall taste.As the melty, golden sandwiches are methodically tasted and ranked, suspense builds to discover which grilled cheese reigns supreme. Will it be a sophisticated blend of artisanal cheeses, or a nostalgic take on the childhood favorite? With so many mouthwatering options, the competition is fierce.",0);
INSERT INTO videos VALUES ('b5AvSdqyxnI',"https://www.youtube.com/embed/b5AvSdqyxnI",'https://i.ytimg.com/vi/b5AvSdqyxnI/sddefault.jpg','Chef Marcus Samuelsson Makes Traditional Ethiopian Kitfo — No Passport Required',"In this video, renowned chef Marcus Samuelsson showcases his expertise in preparing the beloved Ethiopian dish, kitfo. Sourcing the finest grass-fed beef, Samuelsson meticulously hand-chops the meat to achieve the signature texture of this raw, minced delicacy.Samuelsson then masterfully blends the beef with a fragrant spice mixture including mitmita, niter kibbeh, and other traditional Ethiopian seasonings. The result is a vibrant, flavor-packed tartare that tantalizes the senses.To complete the authentic experience, Samuelsson serves the kitfo alongside injera, the spongy Ethiopian flatbread, as well as a selection of colorful, vegetable-based sides. His interpretations of these integral components seamlessly bring the essence of Ethiopian cuisine to life.",0);
INSERT INTO videos VALUES ('vYcUd-CVVCI',"https://www.youtube.com/embed/vYcUd-CVVCI",'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0M3Y_6xWTjI7JX5nSsHcah6fhWmkOm2bq8zMYtTSAI1HGT7orcHW1o9qgstm3b737wWY&usqp=CAU','Africa EU  ETH Chef Yohanis Cooking Series EP 1',"Immerse yourself in the vibrant flavors of Spain with this classic recipe for Valencian paella. Simmered to perfection with short-grain Spanish rice, this dish is infused with the earthy aroma of saffron and accented by a colorful medley of vegetables, chicken, and seafood.The key to an authentic paella lies in the preparation - the rice is toasted until it develops a delightful crust on the bottom of the pan, creating a harmony of textures in every bite. Served straight from the iconic paella pan, this communal dish encourages gathering around the table to savor each flavor-packed mouthful.",0);
INSERT INTO videos VALUES ('7r3dlmYUf4s',"https://www.youtube.com/embed/7r3dlmYUf4s",'https://i.ytimg.com/vi/7r3dlmYUf4s/maxresdefault.jpg','Easy Classic Beef Stroganoff Recipe - Natasha&#39;s Kitchen',"Learn how to cook Classic Beef Stroganoff, with tender strips of beef and mushrooms, in an incredible creamy sauce. This is an easy and excellent 30 minute dinner. ",0);



