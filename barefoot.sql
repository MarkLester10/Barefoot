-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 02:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barefoot`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `icon`, `created_at`) VALUES
(2, 'Styles', 'styles', 'styles.svg', '2021-02-12 06:59:32'),
(3, 'Activities', 'activities', 'activities.svg', '2021-02-12 06:59:32'),
(4, 'Planning', 'planning', 'planning.svg', '2021-02-12 07:00:48'),
(5, 'Inspiration', 'inspiration', 'inspiration.svg', '2021-02-12 07:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment`, `created_at`) VALUES
(80, 51, 25, 'Test Comment', '2021-02-22 13:27:03');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `reading_time` int(11) NOT NULL,
  `youtube_url` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `is_published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `reading_time`, `youtube_url`, `category_id`, `image`, `body`, `is_published`, `created_at`) VALUES
(13, 51, 'Trans-Siberian Trains: Border Crossing into Mongolia', 'trans-siberian-trains-border-crossing-into-mongolia', 6, '', 2, '1613482817_pexels-eberhard-grossgasteiger-1624256.jpg', '&#60;p&#62;With an indefinite amount of hours stretching before us and a train carriage full of foreigners (we were all lumped together, whereas on the other train rides we were scattered throughout the train&#38;rsquo;s carriages), our exit from Russia and entry into Mongolia actually ended up being a lot of fun. For part 1 of my saga on the Trans Siberian trains, Moscow to Irkutsk, see&#38;nbsp;&#60;a href=&#34;https://www.legalnomads.com/1st-trans-siberian-wrap-up-moscow-to-irkusk/&#34; target=&#34;_blank&#34;&#62;here&#60;/a&#62;.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;h2&#62;This is what the border crossing into Mongolia was like.&#60;/h2&#62;&#13;&#10;&#13;&#10;&#60;p&#62;1pm: We stop at the Russian border and are told we have 3 hours to kill before Russian passport control will make it onto our train carriage (carriage #10) for our exit requirements. We &#38;ndash; for this leg of the journey, &#38;ldquo;we&#38;rdquo; was Bryce and me, &#38;ldquo;the Peters&#38;rdquo; (an Irish diplomat and a British TV reporter both stationed in Moscow who we kept bumping into throughout Siberia), Emma, a tour guide from Oz, 2 German women from Berlin, Raul, a Chilean on vacation for 3 weeks and at least 10 Brits &#38;ndash; decide to climb our way over the railroad tracks and down the river at the border&#38;rsquo;s edge. This seemed like a bright idea until we started to get eaten alive by bugs, but the scenery was definitely picturesque! We hobble &#38;ndash; scratching &#38;ndash; back toward the train, only to see that most of it is missing: as passport control made its way through the carriages, an engine came and took those carriages away to where customs officials waited (a km down the tracks).&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Approaching the border; Me and Lise (from Montreal) at the bug-infested river:&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#60;img alt=&#34;at the border crossing into mongolia, waiting to pee&#34; src=&#34;http://4.bp.blogspot.com/_X9anex0NTKU/SNoy1DLPaDI/AAAAAAAAAWE/K5uzUoqwO8I/s320/IMG_8867.JPG&#34; style=&#34;height:304px; width:405px&#34; /&#62;&#60;br /&#62;&#13;&#10;4pm: We are herded back on the train for passport control. This goes on without a hitch and we all tumble out again until the engine comes to drag us to customs.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;5pm: Lots of beer is purchased at the local store. And vodka. And rum. And frozen strawberries, as a substitute for Popsicles (Raul&#38;rsquo;s idea). The Peters serenade us in the afternoon sun. Turns out they are in a band together in Moscow.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Carriage #10 at the Russian Exit point&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#60;img alt=&#34;&#34; src=&#34;http://4.bp.blogspot.com/_X9anex0NTKU/SNoyitM9RpI/AAAAAAAAAV8/9Ar-jXLPodM/s320/IMG_8855.JPG&#34; style=&#34;height:460px; width:345px&#34; /&#62;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;6pm:&#38;nbsp;Customs! Our carriage gets dragged down the tracks and the customs officials and their dogs board the carriage. I stick my head out to see what is going and a huge German Shepard licks my nose. Not satisfied with just me, the Peters tell us that the dog went berserk in their cabin and, once the luggage compartment was opened (with the Peters wondering who planted what in their cabin), the dog proceeded to eat the sausage they had with them for the 2nd part of the journey. Someone needs new training.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;7:30pm: We move to the Mongolian side and are stuck on the train, with the toilets locked. Raul, being the Latin Loverist that he is, starts to charm the provenitza (the Russian name for the woman looking after the train carriage, who gives you sheets, hot water, etc and prevents random people from coming into the cabin while you sleep) first with chocolate and then with hugs, until she agrees to put his beer in the fridge to keep it cold. She is by far the grumpiest provenitza we have had on our train trips, growling at anyone who tries to talk to her and rolling her eyes dramatically when she doesn&#38;rsquo;t understand (which is always, since we don&#38;rsquo;t speak Russian and she doesn&#38;rsquo;t speak English). Only the Peters (who do speak Russian) and Raul manage to get a smile out of her.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Mongolian Customs; Biding our time at the border:&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#60;img alt=&#34;&#34; src=&#34;http://4.bp.blogspot.com/_X9anex0NTKU/SNozTT92YHI/AAAAAAAAAWU/QS_Y48Pix8o/s320/IMG_8876.JPG&#34; style=&#34;height:298px; width:397px&#34; /&#62;&#60;br /&#62;&#13;&#10;9pm: We are allowed off the train to pee at the Mongolian border. We&#38;rsquo;re all hungry, so we buy dumplings from a woman selling them out of a water cistern. 10 cents each. And delicious.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;9:30pm: Still waiting for our train (the &#38;ldquo;train&#38;rdquo; thus far consists of our Carriage #10 and an engine), Bryce and the Peters jokingly try and push our carriage toward the other train at the station. The provenitza loses it, screaming at us in Russian and motioning vigorously for us to follow her away from the tracks. Next thing we know, our carriage is being pulled away, and the provenitza is laughing her ass off. This was the only time I saw her laugh in the 2 days we spent with her! After a silent, tense 5 minutes of us wondering when the train will come back, it reappears.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#60;strong&#62;10pm&#60;/strong&#62;: We&#38;rsquo;re off again!&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#60;strong&#62;11pm&#60;/strong&#62;: The&#38;nbsp;&#60;a href=&#34;https://en.wikipedia.org/wiki/Samovar&#34;&#62;samovar&#38;nbsp;&#60;/a&#62;warms up again and we all have noodle soups for dinner:&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;12am: Raul starts to show us movies on his Asus EEE PC.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;12:30am: We are banished to the sliver of &#38;ldquo;smoking space&#38;rdquo; between the cars because everyone else in our carriage is asleep.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;1am: The Peters convince Raul, who has consumed a good bit of rum at this point, that there is &#38;ldquo;nothing like&#38;rdquo; skipping down the train&#38;rsquo;s hallway while it is at full speed. Much skipping ensues.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;2am: I go to bed, to the hop-hop-hop sound of Raul skipping up and down the hallway.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;5am: Rude awakening by our provenitza, who is literally dragging us out of bed by tearing the sheets out from under us.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Final Tally:&#60;br /&#62;&#13;&#10;Arrival&#38;nbsp;at Russian border (to exit the country): 1pm&#60;br /&#62;&#13;&#10;Russian Exit Passport control finally makes it on our train: 4pm&#60;br /&#62;&#13;&#10;We move to Russian Exit Customs control (and dogs): 6pm&#60;br /&#62;&#13;&#10;Train leaves for the Mongolian border: 7:30pm&#60;br /&#62;&#13;&#10;Mongolian passport control: 8pm&#60;br /&#62;&#13;&#10;Get passport back from Mongolian officials and get to pee: 9pm&#60;br /&#62;&#13;&#10;Depart for Mongolia: 10pm.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Total Border Crossing: 9 hours&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;* * *&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;I am writing this entry from Ulaanbaatar, after a wonderful week in the Gobi desert. Gobi blog entry to come later on. Tomorrow, Bryce and I depart for China &#38;ndash; I wonder how that border crossing will be!&#60;/p&#62;&#13;&#10;', 1, '2021-02-16 21:40:17'),
(25, 51, 'Ilocos Weekend Trip: Summary, Itinerary and Budget Updated', 'ilocos-weekend-trip-summary-itinerary-and-budget-updated', 5, '5CgGTSBs0mU', 4, '1613806915_cliff-wallpaper-hd-3200x2048-40151.jpg', '&#60;hr /&#62;&#13;&#10;&#60;p&#62;When&#38;nbsp;&#60;strong&#62;the Poor Traveler&#38;nbsp;&#60;/strong&#62;was planning this trip to Ilocos, I did not have much expectations. Sure I had heard about Ilocandia and all the raves about it before on TV but in all honesty, it did not really appeal to me. I just wanted to see the Bangui Windmills, Pagudpud and Vigan. That was all I wanted.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;But I got more than I bargained for.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;h2&#62;Ilocos Weekend Trip: Summary, Itinerary and Budget&#60;/h2&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#60;img src=&#34;https://www.thepoortraveler.net/wp-content/uploads/2020/08/Pre-Post-Reminder-1.png&#34; /&#62;&#60;br /&#62;&#13;&#10;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;When&#38;nbsp;&#60;strong&#62;the Poor Traveler&#38;nbsp;&#60;/strong&#62;was planning this trip to Ilocos, I did not have much expectations. Sure I had heard about Ilocandia and all the raves about it before on TV but in all honesty, it did not really appeal to me. I just wanted to see the Bangui Windmills, Pagudpud and Vigan. That was all I wanted.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;But I got more than I bargained for.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;h2&#62;Ilocos Weekend Trip: Summary, Itinerary and Budget&#60;/h2&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#60;img src=&#34;https://www.thepoortraveler.net/wp-content/uploads/2020/08/Pre-Post-Reminder-1.png&#34; /&#62;&#60;br /&#62;&#13;&#10;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;When&#38;nbsp;&#60;strong&#62;the Poor Traveler&#38;nbsp;&#60;/strong&#62;was planning this trip to Ilocos, I did not have much expectations. Sure I had heard about Ilocandia and all the raves about it before on TV but in all honesty, it did not really appeal to me. I just wanted to see the Bangui Windmills, Pagudpud and Vigan. That was all I wanted.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;But I got more than I bargained for.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#60;a href=&#34;https://www.thepoortraveler.net/wp-content/uploads/2010/08/history-of-bantay-church-and-belfry.jpg&#34;&#62;&#60;img alt=&#34;&#34; src=&#34;https://www.thepoortraveler.net/wp-content/uploads/2010/08/history-of-bantay-church-and-belfry.jpg&#34; style=&#34;height:336px; width:448px&#34; /&#62;&#60;/a&#62;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;The Ilocos Region is home to the most amazing tourist destinations in the country. I was pleasantly surprised that even up to now, this trip to Ilocos remains on my short list of my best domestic travels. Ilocos is pure love.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;One of my friends was right. Each place has its element. Each place offers an intimate relationship with nature. He believes, for obvious reasons, that wind is the element of this wonderful region. He&#38;rsquo;s right. Yes, the Bangui Windmills is a proof but really, when you&#38;rsquo;re in Ilocos, you&#38;rsquo;ll feel like it is a &#38;ldquo;wind realm,&#38;rdquo; not just because of its presence and power but also there&#38;rsquo;s this constant feeling of being embraced by the wind. I don&#38;rsquo;t know, the wind there seemed to welcome and entertain us.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;For example, during visit to&#38;nbsp;&#60;strong&#62;Cape Bojeador Lighthouse&#60;/strong&#62;&#38;nbsp;&#38;mdash; my favorite part of the tour &#38;mdash; I was standing on the top of the tower, looking over this awesome terrain and it made me realize just how wind changes landscapes and shapes cultures. That&#38;rsquo;s just me.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;h3&#62;Day Zero&#60;/h3&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Our trip began with a meet up at the Trinoma parking lot at around 9pm. We were a group of 7 and a tour guide-slash-driver was with us. We were able to leave the place 30 minutes later. We had several stopovers starting at a gas station along NLEX. Truth is, I actually don&#38;rsquo;t remember much about our moments inside the van because I was sleeping most of the time. However, every time we stop (which happened 5 times so some of us could buy food, pee, buy food, and pee) I would wake up but would go back to dreamland after 2 seconds.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;h3&#62;Day 1&#60;/h3&#62;&#13;&#10;&#13;&#10;&#60;p&#62;The next time I woke up we were on the parking lot of Bantay Church. Here&#38;rsquo;s our itinerary for Day 1:&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#60;img alt=&#34;&#34; src=&#34;https://www.thepoortraveler.net/wp-content/uploads/2010/08/paoay-church.jpg&#34; style=&#34;width:460px&#34; /&#62;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;ul&#62;&#13;&#10;&#9;&#60;li&#62;&#60;a href=&#34;https://www.thepoortraveler.net//2010/08/12/bantay-church-and-belfry-in-ilocos-ilocos-road-trip-day-1/&#34;&#62;Bantay Church and Belfry in Ilocos&#60;/a&#62;&#60;/li&#62;&#13;&#10;&#9;&#60;li&#62;&#60;a href=&#34;https://www.thepoortraveler.net//2010/08/12/breakfast-at-cafe-uno-in-vigan-ilocos-road-trip-day-1/&#34;&#62;Breakfast at Cafe Uno in Vigan&#60;/a&#62;&#60;/li&#62;&#13;&#10;&#9;&#60;li&#62;&#60;a href=&#34;https://www.thepoortraveler.net//2010/08/12/a-wild-encounter-at-baluarte-ilocos-road-trip-day-1/&#34;&#62;A Wild Encounter at &#38;lsquo;Baluarte&#38;rsquo;&#60;/a&#62;&#60;/li&#62;&#13;&#10;&#9;&#60;li&#62;&#60;a href=&#34;https://www.thepoortraveler.net//2010/08/12/some-history-some-politics-inside-crisologo-museum-ilocos-road-trip-day-1/&#34;&#62;Some History, Some Politics Inside Crisologo Museum&#60;/a&#62;&#60;/li&#62;&#13;&#10;&#9;&#60;li&#62;&#60;a href=&#34;https://www.thepoortraveler.net//2010/08/14/old-school-pottery-at-the-pagburnayan-ilocos-road-trip-day-1/&#34;&#62;Old School Pottery at the &#38;lsquo;Pagburnayan&#38;rsquo;&#60;/a&#62;&#60;/li&#62;&#13;&#10;&#9;&#60;li&#62;&#60;a href=&#34;https://www.thepoortraveler.net//2010/08/14/the-magnificent-paoay-church-ilocos-road-trip-day-1/&#34;&#62;The Magnificent Paoay Church&#60;/a&#62;&#60;/li&#62;&#13;&#10;&#9;&#60;li&#62;&#60;a href=&#34;https://www.thepoortraveler.net//2010/08/15/overnight-at-java-hotel-in-laoag-ilocos-day-trip-day-1/&#34;&#62;Overnight at Java Hotel in Laoag&#60;/a&#62;&#60;/li&#62;&#13;&#10;&#60;/ul&#62;&#13;&#10;&#13;&#10;&#60;p&#62;We spent the Night 1 at Java Hotel in Laoag City. We actually arrived at the hotel around 4:30pm but we were sooo tired that we all went to sleep right after checking in. We woke up at around 8pm for dinner and went back to bed.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;h3&#62;Day 2&#60;/h3&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Our Day started earlier than 6am. With renewed energy, we were more than excited to hit the road again especially that we already had an idea on what was in store for us that day.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;ul&#62;&#13;&#10;&#9;&#60;li&#62;&#60;a href=&#34;https://www.thepoortraveler.net//2010/08/15/the-breathtaking-cape-bojeador-lighthouse-in-burgos-ilocos-road-trip-day-2/&#34;&#62;The Breathtaking Cape Bojeador Lighthouse&#60;/a&#62;&#60;/li&#62;&#13;&#10;&#9;&#60;li&#62;&#60;a href=&#34;https://www.thepoortraveler.net//2010/08/15/blown-away-by-bangui-windmills-ilocos-road-trip-day-2/&#34;&#62;Blown Away by Bangui Windmills&#60;/a&#62;&#60;/li&#62;&#13;&#10;&#9;&#60;li&#62;&#60;a href=&#34;https://www.thepoortraveler.net//2010/08/15/swept-away-in-blue-lagoon-pagudpud-ilocos-road-trip-day-2/&#34;&#62;Swept Away in Blue Lagoon, Pagudpud&#60;/a&#62;&#60;/li&#62;&#13;&#10;&#9;&#60;li&#62;&#60;a href=&#34;https://www.thepoortraveler.net//2010/08/28/kabigan-falls-in-pagudpud-ilocos-road-trip-day-2/&#34;&#62;Kabigan Falls in Pagudpud&#60;/a&#62;&#60;/li&#62;&#13;&#10;&#60;/ul&#62;&#13;&#10;&#13;&#10;&#60;p&#62;It was already dark when we got out of the woods. It was a bit scary but there were many of us so it was not really a problem. We checked in at Polaris Beach House that night. It wasn&#38;rsquo;t really a luxury accommodation but we were just there to sleep anyway so we didn&#38;rsquo;t complain. After all, the tour was so cheap we actually believed we got what our money was worth. We had buffet dinner and hit the sack at around 9pm.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;h3&#62;Day 3&#60;/h3&#62;&#13;&#10;&#13;&#10;&#60;p&#62;&#60;a href=&#34;https://www.thepoortraveler.net/wp-content/uploads/2010/08/calle-crisologo-vigan-la-funeraria-baquiran.jpg&#34;&#62;&#60;img alt=&#34;&#34; src=&#34;https://www.thepoortraveler.net/wp-content/uploads/2010/08/calle-crisologo-vigan-la-funeraria-baquiran.jpg&#34; style=&#34;width:460px&#34; /&#62;&#60;/a&#62;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;La Funeraria Baquiran&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Vigan was the only item on our itinerary for that day. We explored the city particularly Calle Crisologo, had lunch at Cafe Leona, bought a tonne of pasalubong and hit the road back to Manila at noon.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;ul&#62;&#13;&#10;&#9;&#60;li&#62;&#60;a href=&#34;https://www.thepoortraveler.net//2010/08/28/gone-to-vigan-ilocos-road-trip-day-3/&#34;&#62;Gone to Vigan&#60;/a&#62;&#60;/li&#62;&#13;&#10;&#60;/ul&#62;&#13;&#10;&#13;&#10;&#60;p&#62;We arrived at around 8pm in Manila.&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;h3&#62;EXPENSES&#60;/h3&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Here&#38;rsquo;s the rough estimate of our expenses:&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;ul&#62;&#13;&#10;&#9;&#60;li&#62;&#60;strong&#62;P3300&#38;nbsp;&#60;/strong&#62;&#38;mdash; 3-day, 2-night tour inclusive of transportation, accommodation and entrance fees.&#60;/li&#62;&#13;&#10;&#9;&#60;li&#62;&#60;strong&#62;P1500&#38;nbsp;&#60;/strong&#62;&#38;mdash; total food expenses including incidentals (drinks, snacks)&#60;/li&#62;&#13;&#10;&#60;/ul&#62;&#13;&#10;&#13;&#10;&#60;p&#62;TOTAL:&#38;nbsp;&#60;strong&#62;P4800&#60;/strong&#62;&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Note that this does not include pasalubong yet. I spent around P1200 on pasalubong, mostly longganisa. Hehe. That makes the total&#38;nbsp;&#60;strong&#62;P6000&#60;/strong&#62;. That&#38;rsquo;s it. I hope this helps!&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;Overall, I love Ilocos. I think it&#38;rsquo;s one of the best and most gorgeous places I have visited EVER. Ilocos is just very easy to fall in love with.&#60;/p&#62;&#13;&#10;', 1, '2021-02-19 17:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `posts_likes`
--

CREATE TABLE `posts_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts_likes`
--

INSERT INTO `posts_likes` (`id`, `user_id`, `post_id`, `created_at`) VALUES
(44, 51, 13, '2021-02-22 05:38:08'),
(49, 51, 25, '2021-02-24 07:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

CREATE TABLE `posts_tags` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts_tags`
--

INSERT INTO `posts_tags` (`id`, `post_id`, `tag_id`, `created_at`) VALUES
(48, 13, 4, '2021-02-16 21:40:18'),
(49, 13, 6, '2021-02-16 21:40:18'),
(50, 13, 50, '2021-02-16 21:40:18'),
(131, 25, 136, '2021-02-19 17:17:36'),
(161, 25, 4, '2021-02-20 15:41:55'),
(162, 25, 6, '2021-02-20 15:41:55'),
(163, 25, 50, '2021-02-20 15:41:55'),
(164, 25, 102, '2021-02-20 15:41:55'),
(165, 25, 122, '2021-02-20 15:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`) VALUES
(1, 'festivals', '2021-02-14 15:32:41'),
(2, 'wildlife', '2021-02-14 15:33:20'),
(4, 'cruising', '2021-02-14 15:35:22'),
(6, 'feelgood', '2021-02-14 15:35:51'),
(50, 'hiking', '2021-02-16 14:52:34'),
(51, 'motorsports', '2021-02-16 14:52:34'),
(64, 'islandhopping', '2021-02-16 15:21:23'),
(84, 'outofcountry', '2021-02-16 18:58:02'),
(96, 'surfing', '2021-02-16 21:22:08'),
(102, 'roadtrip', '2021-02-18 13:29:09'),
(122, 'unwind', '2021-02-18 17:28:11'),
(136, 'cliffdiving', '2021-02-19 01:30:16'),
(246, 'byahenidrew', '2021-02-20 15:35:11'),
(256, 'ilocos', '2021-02-21 16:10:00'),
(257, 'heritage', '2021-02-21 16:10:00'),
(258, 'planning', '2021-02-21 16:10:00'),
(259, 'biyahenidrew', '2021-02-21 16:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `banner_title` varchar(255) DEFAULT 'The Art of Storytelling',
  `banner_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `verified`, `token`, `password`, `profile_image`, `banner_title`, `banner_image`, `created_at`) VALUES
(51, 'John Doe', 'hixec10294@donmah.com', 1, 'd51c56c91fb6ceec65b813ff4b87f773508fd2ed6d6ec3b6f8779bc3e2d4b4fb3df9ddfd537ebba460e35c1346cdbbb46b5f', '$2y$10$oFjeav7kWslTBVuVIWCs/.pqVgrDtm2cOW5Loq/TzyoWnnt76/4XS', '1613726339_pexels-aditya-aiyar-1407305.jpg', 'Ilocos Travel Guides', '1613726324_Ilocos-Norte-Wind-Mills.jpg', '2021-02-16 13:38:09'),
(54, 'MyName', 'rofon19078@seacob.com', 1, 'c6f00b7cfc5844436989b267d6d54b851c44799ea5001b543483d4236f077cdddcc10d91fc7f666579c1628bf39bd223dbca', '$2y$10$jZl4PhUR6gFJT/WgXA4DIuzlXad3gPXHXluezN0dX72jmNjslHnsi', '1613972860_11.jpg', 'The Art of Storytelling', NULL, '2021-02-22 05:45:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_ibfk_1` (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts_likes`
--
ALTER TABLE `posts_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `posts_likes_ibfk_2` (`user_id`);

--
-- Indexes for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `posts_likes`
--
ALTER TABLE `posts_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `posts_tags`
--
ALTER TABLE `posts_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `bookmarks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookmarks_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts_likes`
--
ALTER TABLE `posts_likes`
  ADD CONSTRAINT `posts_likes_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD CONSTRAINT `posts_tags_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `socials`
--
ALTER TABLE `socials`
  ADD CONSTRAINT `socials_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
