-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 02:25 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `bettavarieties`
--

CREATE TABLE `bettavarieties` (
  `id` int(100) NOT NULL,
  `finType` varchar(200) NOT NULL,
  `pattern` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bettavarieties`
--

INSERT INTO `bettavarieties` (`id`, `finType`, `pattern`, `color`, `info`) VALUES
(1, 'Veil Tail', '', '', 'The veil tail betta, or VT for short, is the most common kind of tail that you’ll find and is what you’ll see on most pet store betta varieties.\r\n\r\nIn fact, due to its popularity and resulting in over breeding, veil tailed bettas are no longer seen as desirable or accepted on the show circuit.\r\n\r\nThat said, this is still a nice looking fish with a beautiful tail which is long and flowing, and tends to droop from the caudal peduncle. The anal and dorsal fins are also long and flowing.\r\n\r\nVeil tails have an asymmetrical tail, so if you split the tail horizontally in half, the upper and lower parts would not be the same.\r\n\r\nIn almost all specimens, the tail droops or constantly hangs, even when flaring, which likely adds to them being seen as inferior when compared to many other tail types.'),
(2, 'Combtail', '', '', 'The comb tail isn’t really a distinct shape of it’s own, it’s more a trait that can be seen on many other tail shapes. It commonly consists of a fan-like caudal fin with a sizable spread, though normally at less than a 180 degree spread where it would be considered more of a ‘half sun’ (as detailed later.)\r\n\r\nA comb tail betta’s fins will have rays that extend beyond the fin webbing, giving it a slight spiky appearance, said to look like a comb, but nothing too dramatic such as seen in the crown tail below.\r\n\r\nThese types of tails can have the droop typically seen with the veil tail, though it’s not preferred.'),
(3, 'Crown Tail', '', '', 'In the words of ‘bettySpelendens.com’ (link to source removed as the site has, sadly, recently gone offline):\r\n\r\n“The Crowntail was founded 1997 in West Jakarta, Slipi, Indonesia. The webbing between the fin rays is reduced, producing the appearance of spikes or prongs, hence the name “Crown Tail”.\r\n\r\nThe crown tail (abbreviated to CT) is perhaps one of the easiest tail types to recognize as the reduced webbing and very extended rays give crown tails a highly distinctive spiky appearance.\r\n\r\nThere can be double, triple, crossed and even quadruple ray extensions. Crowntail betta can have a full 180-degree spread, but less is also acceptable and indeed most commonly seen.\r\n\r\nThe term ‘crown tail’ is often abbreviated to ‘CT’ when describing such fish.'),
(4, 'Delta', '', '', 'Delta tail betta fish are so called because it’s shaped somewhat like the Greek letter d, but on its side and more rounded at the end. That is to say, if you drew a horizontal line through the middle of the body of a delta or super delta, it would be symmetrical and there would be an equal amount of tail above and below the line.\r\n\r\nFinally, there should be no ‘combing’ or ‘crowning’ of the rays, the tail edge should have the webbing right to the ends so the tail does not appear ‘spiky’.'),
(5, 'Super Delta', '', '', 'The main difference between a super delta betta fish and a standard delta, is that a super delta tail is approaching – but not quite – a 180-degree spread (180-degree would be a half moon), whereas the spread of a plain delta tail is much smaller.\r\n\r\nWhat differentiates both delta and super delta from some similar tail types is that it should be evenly spread.\r\n\r\nThat is to say, if you drew a horizontal line through the middle of the body of a delta or super delta, it would be symmetrical and there would be an equal amount of tail above and below the line.\r\n\r\nFinally, there should be no ‘combing’ or ‘crowning’ of the rays, the tail edge should have the webbing right to the ends so the tail does not appear ‘spiky’.'),
(6, 'Double Tail', '', '', 'The double tail betta, also known as the DT, is just what it sounds like: It has a double caudal fin.\r\n\r\nIt’s worth noting that this isn’t just a single caudal fin split in half, but a true double tail with two caudal peduncles.\r\n\r\nDouble tail betta fish don’t necessarily have caudal fins even in size, but an even split is extremely desirable. They also tend to have shorter bodies and broader dorsal and anal fins, which usually mirror each other more or less exactly.'),
(7, 'Half Moon', '', '', 'The caudal fin of a half moon betta fish has a characteristic full 180-degree spread, like a capital D or, fittingly, a half moon.\r\n\r\nBoth the dorsal and anal fins are also larger than average in halfmoon bettas.\r\n\r\nAlthough they are striking and sought after, it’s worth noting that this unnaturally large tail can lead to issues of tearing and tail damage, often referred to as ‘blowing a tail.’\r\n\r\nHalf moons are abbreviated to HM in descriptions.'),
(8, 'Over Half Moon', '', '', 'The over half moon is basically an extreme version of the half moon. It is the same tail in all ways except one: the spread, when flared, is more than 180 degrees.'),
(9, 'Half Sun', '', '', 'The half sun tail type has come about by selectively breeding the half moon and the crown tail varieties together.\r\n\r\nThis type has the full 180-degree spread of the half moon, but has rays extending beyond the webbing of the caudal fin, as you would see with the crown tail.\r\n\r\nThat said, the rays are only slightly extended, not nearly enough to be confused with a crown tail.'),
(10, 'Plakat', '', '', 'The plakat betta, or PK for short, is a short-tailed betta fish, which is more closely related to the betta splendens found in the wild than other varieties.\r\n\r\nThey are sometimes mistaken for females (who all have shorter tails), but the difference is the males have longer ventral fins, more rounded caudal fins and sharply pointed anal fins.\r\n\r\nThe traditional plakat simply has a short rounded or slightly pointed tail. However, there are now two other types of plakat thanks to selective breeding: the half moon plakat and the crown tail plakat.\r\n\r\nThe half moon variety has a short tail but with a 180-degree spread like a traditional half moon. The crown tail type has extended rays and reduced webbing, like a regular crown tail, but again this is with a short tail characteristic of a plakat, rather than a long one.'),
(11, 'Rosetail', '', '', 'The rosetail is similar to a HM or extreme half moon, so the spread of the caudal fin is 180 degrees or more. The difference being that the rays have excessive branching, which gives a more ruffled look to the end of the tail, said to look like the ruffled petals of a rose.'),
(12, 'Feathertail', '', '', 'If there is a larger than usual amount of branching (even for a rosetail) giving an even more pronounced, or perhaps ‘extreme ruffled effect’, with a slight zig-zag look, then this is referred to as a feather tail.'),
(13, 'Round Tail', '', '', 'The round tail is similar to a delta, but is fully rounded, without straight edges near the body that makes most tails the shape of a D.\r\n\r\nIt’s also similar to a basic plakat, but is significantly longer and fuller than the plakat’s characteristically short tail.'),
(14, 'Spade Tail', '', '', 'The spade tail betta is quite similar to a round tail, but rather than the tip of the caudal fin being rounded, it comes to a single point, like the spade in a deck of playing cards (though on it’s side.)\r\n\r\nThe spread of a spade tail should be even on both sides of the tail.\r\n\r\nBettySplendens.com speculate, (again, link to source removed as site has sadly gone offline):\r\n\r\n…it can be safely said that most “spade tails” are simply a variation of the Veiltail, and pretty commonly seen on females and juvenile VTs whose finnage hasn’t reached full weight and length.\r\n\r\nAn interesting observation for sure!'),
(15, '', 'Bi-Colored', '', 'A bi-colored betta fish will have a body of one color and fins of another color.\r\n\r\nThis generally works in one of two ways:\r\n\r\nA ‘light bicolored betta’ should have a light colored body, and although light colored fins are acceptable, dark contrasting colors to the body are far more preferred.\r\nA ‘dark bicolored betta’ must have a solidly colored body in one of the 6 accepted solid colors. The fins either translucent or brightly colored, with contrasting color to the body preferred.\r\nWith both the light and dark bicolor varieties, the fish should only have two colors and any other marking would be a disqualification if being judged (with the exception of darker shading on the head which is seen in the vast majority of specimens.)'),
(16, '', 'Butterfly', '', 'The butterfly pattern type is when they have a single solid body color that extends into the base of the fins. The color then stops in a strong distinct line and the rest of the fins are pale or translucent.\r\n\r\nSo in essence, the fins are two-tone, kind of like a second color band on the outer half of the fins circling the rest of the solid colored betta.\r\n\r\nThe ideal split of color in the fins would occur halfway, so they are a 50/50 split, half and half between the two colors. However, this is rarely achieved and some leeway of 20% or so either way is accepted if being shown.'),
(17, '', 'Cambodian', '', 'A Cambodian is actually a variation on the bi-colored pattern, but is distinct enough to have been named in its own right.\r\n\r\nThis pattern consists of a pale body, preferably flesh colored white or light pink, paired with bright solid colored fins that are generally red, though other color fins can and do occur (but still with the solid flesh-colored body.)'),
(18, '', 'Dragon', '', 'The dragon pattern is relatively new and is proving very popular due to the very striking, almost metallic like appearance.\r\n\r\nThe base color is rich and bright, often red, but the scales on the body of the fish are thick, metallic, opaque white and iridescent, that are said to make the body look as though they’re covered in the armored scales of a dragon.\r\n\r\nAccording to bettablogging.com:\r\n\r\nThe term “dragon” is often misused in the betta community to refer to any fish that has thick scaling that covers the body and face. However, true dragons are not just thick-scaled fish but fish with opaque, white, metallic scales and varied finnage. If he does not have all of these traits, he may be classified as a “metallic” betta.\r\n\r\nSo not all metallic looking betta are in fact ‘dragon’ and the name is often wrongly given to fish that are outside of the true description.'),
(19, '', 'Marble', '', 'Marble betta fish have irregular blotchy or splash-like patterning all over the body.\r\n\r\nGenerally, the base color of the fish is pale and the patterns are in a bold, solid color, such as red or blue.\r\n\r\nAll marble types must have marbling on their body, but not necessarily on the fins. Some have translucent fins, others have fins showing marbling. Both variations are acceptable.\r\n\r\nWhat’s strange about marble bettas is their patterns can change throughout their lives.'),
(20, '', 'Mask', '', 'To understand the significance of the mask pattern, you need to know that the faces of betta fish are naturally darker than the main part of their body.\r\n\r\nHowever, with mask bettas, their faces are the exact same color and shade as the rest of their bodies, making head to base of tail a uniform single color.\r\n\r\nThis is usually seen in turquoise, blue and copper varieties, though is found in many other colors too.'),
(21, '', 'Multicolored', '', 'The multicolored pattern type can be used to describe any betta that has three or more colors on their body and doesn’t fit into any other pattern type.\r\n\r\nOf course, this applies to an incredible number of variations, too many to list here, but I’m sure you get the general idea from the description.'),
(22, '', 'Piebald', '', 'A piebald betta is one with a white or pinkish, flesh-colored face, and a body of another color altogether.\r\n\r\nThe body of a piebald fish is usually a solid dark color, but can have some butterfly-like patterning on the fins, or maybe even have slight marbling.'),
(23, '', 'Solid', '', 'A solid betta fish is exactly what it sounds like. It is a fish with one, single, solid color all over it’s body.\r\n\r\nThis pattern is most often, but not exclusively, seen in red bettas.'),
(24, '', 'Wild Type', '', 'The wild-type pattern type, as the name suggests, is the most closely related to betta splendens in the wild.\r\n\r\nThey consist of a mostly dull red or brown as the main color for most of the body.\r\n\r\nHowever, there will be some blue and/or green iridescent scales on the fish, and some blue and red in the fins of the males.'),
(25, '', '', 'Black', 'There are actually three types of black betta:\r\n\r\nMelano (plain black and infertile)\r\nBlack lace (which are fertile)\r\nMetallic (or copper) black where the fish also has some iridescent scales.\r\nMelano black is the most popular and deepest black of the three, where a gene has mutated to massively increase the amount of black pigment in the skin. Melano females being infertile means they can only be bred by melano gene carrying females of other varieties.\r\n\r\nThe black lace betta is also a nice deep black color, though not quite as deep as the melano. However, this variety isn’t infertile unlike the melano females so is more easily bred and therefore more readily achieved and available.'),
(26, '', '', 'Blue', 'There are several shades of blue that can present in betta fish.\r\n\r\nTrue blue is often seen as a “blue wash” type color, but you can also find steel blue types, which are cold and grayish.\r\n\r\nHowever, arguably the richest and most vibrant is the ‘Royal Blue Betta’ that has iridescent bright blue coloring.'),
(27, '', '', 'Steel Blue', 'There are several shades of blue that can present in betta fish.\r\n\r\nTrue blue is often seen as a “blue wash” type color, but you can also find steel blue types, which are cold and grayish.\r\n\r\nHowever, arguably the richest and most vibrant is the ‘Royal Blue Betta’ that has iridescent bright blue coloring.'),
(28, '', '', 'Royal Blue', 'There are several shades of blue that can present in betta fish.\r\n\r\nTrue blue is often seen as a “blue wash” type color, but you can also find steel blue types, which are cold and grayish.\r\n\r\nHowever, arguably the richest and most vibrant is the ‘Royal Blue Betta’ that has iridescent bright blue coloring.'),
(29, '', '', 'Clear', 'The cellophane betta has a translucent skin (hence ‘cellophane’) with no pigments, that would be colorless if it wasn’t for the inside flesh of the fish shining through the translucent skin to give a pink-ish, fleshy color appearance. They also have translucent fins and tail.\r\n\r\nThis type is often confused with albino betta, but can be told apart by the cellophanes black eyes, whereas an albino has pink eyes like almost all true albino animals.'),
(30, '', '', 'Cellophane', 'The cellophane betta has a translucent skin (hence ‘cellophane’) with no pigments, that would be colorless if it wasn’t for the inside flesh of the fish shining through the translucent skin to give a pink-ish, fleshy color appearance. They also have translucent fins and tail.\r\n\r\nThis type is often confused with albino betta, but can be told apart by the cellophanes black eyes, whereas an albino has pink eyes like almost all true albino animals.'),
(31, '', '', 'Chocolate', 'The ‘chocolate betta’ isn’t an officially recognized type, but it is a term commonly used and accepted by many.\r\n\r\nThe ‘chocolate’ naming is commonly accepted to refer to a brown bodied betta, with either yellow or orange fins, a particular variety of a bicolor basically.'),
(32, '', '', 'Copper', 'The copper betta fish is extremely iridescent, coming in an almost light gold, or deep copper color with some red, blue and purple metallic shines to them.\r\n\r\nUnder weak light, they might appear silver or brown but under stronger light, an amazing sparkling copper shine can be seen.'),
(33, '', '', 'Green', 'True green is rarely seen in betta, so what people think of as green is more likely to be a turquoise.\r\n\r\nIn fact, green is hard to see in most bettas and will look like other dark colored fish unless held up to a torchlight where the iridescent green will then shine out.\r\n\r\nHowever, you do see some true greens visible with the naked eye, dark green being especially sought after and highly prized varieties.'),
(34, '', '', 'Mustard Gas', 'Mustard gas bettas are another form of bi-colored varieties considered to be worthy of being given their own name.\r\n\r\nThis color refers to any specimen with a dark colored body of blue, steel blue or green, along with yellow or orange fins.\r\n\r\nThe mustard gas is often incorrectly called a ‘chocolate’ when this should only apply to those with brown bodies.'),
(35, '', '', 'Opaque', 'Opaque isn’t technically one color but is caused by a gene that overlays a milky white color on top of another color. Therefore, there are opaque versions of all the main colors.'),
(36, '', '', 'Pastels', 'With some colors, this gives them a pastel hue, and these opaque bettas are fittingly called ‘pastels’ and considered a type of their own.'),
(37, '', '', 'Orange', 'Orange bettas are quite rare, but when you find them they are usually a rich tangerine type shade.\r\n\r\nHowever, in bad lighting, they often look red. To bring out their best color, you want decent strength, full spectrum illumination.'),
(38, '', '', 'Orange Dalmatian', 'This color is sometimes also called ‘apricot spots’ or even ‘Orange spotted betta.’\r\n\r\nOrange dalmatian betta fish are a pale orange on both the body and fins, but there are brighter, deeper colored orange spots and / or streaks all over the fins.'),
(39, '', '', 'Purple', 'It’s almost unheard of to have a true purple betta fish, but you do more often find rich violets or purplish-blues with some copper iridescence.\r\n\r\nThere are some solid, all purple bettas, and also some purple bodied specimen with fins of a secondary color that have surfaced under various creative names.\r\n\r\n(Unfortunately, I’ve been unable to find copyright free images of any of the bicolor purple bettas, but a google search will show them quite readily.)'),
(40, '', '', 'Violet', 'It’s almost unheard of to have a true purple betta fish, but you do more often find rich violets or purplish-blues with some copper iridescence.\r\n\r\nThere are some solid, all purple bettas, and also some purple bodied specimen with fins of a secondary color that have surfaced under various creative names.\r\n\r\n(Unfortunately, I’ve been unable to find copyright free images of any of the bicolor purple bettas, but a google search will show them quite readily.)'),
(41, '', '', 'Red', 'Red is a dominant color in betta fish, very commonly seen but nonetheless still very striking and beautiful.\r\n\r\nGenerally, you’ll get a bright, solid all-over red, but it can find its way into other colors as a “red wash” which is mostly undesirable.'),
(42, '', '', 'Turquoise', 'This is a somewhat hard color to define.\r\n\r\nIt is a blue-green color, somewhere between blue and green in fact, which can end up looking kind of plain blue or plain green in certain light.\r\n\r\nThe best way to determine if it’s a turquoise is to first see that’s it too ‘green looking’ to be a blue, then shine a light to it and there shouldn’t be any yellow shades at all if it’s a turquoise fish. If there are, it’s more likely to be green.'),
(43, '', '', 'Wild-Type', 'Although used to describe patterning of some betta, the term wild-type is also used to describe a color.\r\n\r\nWild type betta have an iridescent green or blue body with some red and / or blue on the fins.'),
(44, '', '', 'Yellow', 'Yellow betta fish are commonly known as ‘non-red’ and can be anywhere from an extremely light yellow to rich and buttery hues.'),
(45, '', '', 'Pineapple', 'Pineapple is a form of yellow where there is darker definition around the scales, which gives a look to the fish somewhat like that of the scales on a pineapple.'),
(46, '', '', 'Albino', 'You probably know about albinism in other species, and the same goes for bettas, really.\r\n\r\nAlbino betta fish will be solid white with no pigmentation at all, with eyes that appear pink or red. If you have a white fish with black eyes, this is simply a white type and not an albino.\r\n\r\nAlbino betta are extremely rare, and they go blind at a very early age. They are therefore extremely hard to breed, necessarily continuing their scarcity.');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type`) VALUES
(1, 'general'),
(2, 'lifespan'),
(3, 'livingConditions');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `type`) VALUES
(1, 'How long do betta fish live?', 'In ideal living conditions, a betta fish can live as long as 5 years. ', 'lifespan'),
(2, 'Can betta fish live with other fish?', 'Yes, however it is not recommended for male betta fish to have addional tank mates as it can stress the betta fish out. Male betta fish tend to be more aggressive than females so if you are set on a community tank, look into purchasing a female betta instead.', 'livingConditions'),
(3, 'What is the recommended tank size?', 'The ideal tank size for a single betta is 10 gallons. ', 'livingConditions'),
(4, 'What do betta fish eat?', 'Betta fish should eat a high protien diet. Betta fish love to eat blood worms, brine shrimp, and betta pellets. ', 'lifestyle'),
(5, 'How often should I clean my tank?', 'Small tanks that are under 2.5 gallons should be cleaned 4 - 5 times per week. Larger tanks need only to be cleaned once or twice every two weeks.', 'livingConditions'),
(9, 'test', 'test', 'general'),
(10, 'hello', 'hello', 'general');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `dateUpdated` date DEFAULT NULL,
  `postId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `content`, `date`, `dateUpdated`, `postId`) VALUES
(9, 'Why is my betta a brat', 'My betta likes 2 eat everything. plz help', '2019-11-02 09:56:45', NULL, 0),
(17, 'HELP! My betta fish is SICK', 'MY BABY IS SICK AND I DONT KNOW WHAT TO DO. PLEASE SEND HELP', '2019-11-02 12:58:05', NULL, 0),
(18, 'Live Plants vs Plastic?', 'What is better?', '2019-11-02 12:58:33', '2019-11-04', 0),
(21, 'Betta and other fish?', 'What kind of fish are good to have with other fish?', '2019-11-02 13:09:51', '2019-11-04', 0),
(22, 'Betta sicknesses?', 'What kind of sicknesses are there?', '2019-11-02 13:10:47', '2019-11-04', 0),
(23, 'Betta suggestions', 'First time betta owner. I dont know what to do. any suggestions on how to take care of the thing?', '2019-11-02 13:11:50', NULL, 0),
(24, 'Can betta fish learn tricks?', '  saw a youtube video where someone taught there betta how to do tricks? wanted to know how that was possible???? I have no idea! HEEELP!', '2019-11-02 13:12:52', '2019-11-05', 0),
(25, 'Food to betta?', ' what is a good type of food to give to a betta...!!', '2019-11-02 13:13:23', '2019-11-05', 0),
(26, 'What size of tank is good', 'how big of a tank should i purchase for my betta?', '2019-11-02 13:13:50', NULL, 0),
(27, 'First time betta owner help', '  I dont know what to do!!! THe fish is swimming backwards!??!?', '2019-11-02 13:14:34', '2019-11-05', 0),
(30, 'How long until my betta is no longer a baby?', ' Asking for a friend.', '2019-11-03 10:05:39', '2019-11-06', 0),
(36, 'Betta fish?', 'UPDATE??! Pompano snailfish eel-goby halfbeak golden shiner, &quot;golden loach goldfish.&quot; Tadpole fish: midshipman. Creek chub roundhead pearleye merluccid hake squarehead catfish. Carpsucker scup bichir squaretail smalltooth sawfish prickleback fathead sculpin queen danio loach Devario giant danio Black swallower bandfish porgy lionfish. Walleye zebra tilapia, bigeye squaretail sauger eagle ray lizardfish betta pikeblenny, soapfish! Waryfish blue catfish, alfonsino prickly shark, rohu, molly longjaw mudsucker, stargazer dorado North American freshwater catfish. Ridgehead Atlantic eel cisco wolffish ridgehead porgy common carp African lungfish sand stargazer! Dojo loach--powen--cobbler clownfish porbeagle shark dusky grouper torrent fish threadfin? Salamanderfish; yellowmargin triggerfish, madtom Moses sole trumpetfish pearl danio mudfish northern Stargazer emperor arowana anemonefish blue whiting, emperor oceanic flyingfish sleeper flying gurnard sarcastic fringehead. Sea bream ', '2019-11-05 08:25:48', '2019-11-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `content` varchar(300) NOT NULL,
  `postId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `content`, `postId`) VALUES
(2, 'big dummy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bettavarieties`
--
ALTER TABLE `bettavarieties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bettavarieties`
--
ALTER TABLE `bettavarieties`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
