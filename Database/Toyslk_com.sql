-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 07, 2023 at 11:48 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Toyslk.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `email`, `password`) VALUES
(1, 'Hiran Sanjeewa', 'hiransanjeewaa@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `customerID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `units` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`customerID`, `productID`, `units`) VALUES
(37, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `customerName` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `addressLine1` varchar(50) NOT NULL,
  `addressLine2` varchar(50) NOT NULL,
  `District` varchar(15) NOT NULL,
  `Province` varchar(15) NOT NULL,
  `Country` varchar(15) NOT NULL,
  `postalCode` int(11) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `customerName`, `email`, `mobile`, `addressLine1`, `addressLine2`, `District`, `Province`, `Country`, `postalCode`, `password`) VALUES
(1, 'saman', 'abc@gmail.com', '0766199583', 'saa', 'kj', 'sasaasa', 'sasa', 'saasaa', 32565, '123'),
(37, 'Hiran', 'hiransanjeewaa@gmail.com', '0702568106', 'no asd dasda,asdsad,asd', 'sad,dasd,asdasd', 'Badulla', 'Uva', 'Srilanka', 12312, '123'),
(39, 'Dr. Nalin Warnajith', 'user@gmail.com', '0768627447', 'No.12 ,Campus Road', 'Kelaniya', 'Gampaha', 'Western', 'Sri Lanka', 40000, '12345'),
(40, '', '', '', '', '', '', '', '', 0, ''),
(41, '', '', '', '', '', '', '', '', 0, ''),
(42, '', '', '', '', '', '', '', '', 0, ''),
(43, '', '', '', '', '', '', '', '', 0, ''),
(44, '', '', '', '', '', '', '', '', 0, ''),
(45, '', '', '', '', '', '', '', '', 0, ''),
(46, '', '', '', '', '', '', '', '', 0, ''),
(47, '', '', '', '', '', '', '', '', 0, ''),
(48, 'asdasd', 'hiransanjeewadsa', '4334343434', 'asdasdasd', 'adsasd', 'sdffsd', 'fdsfsd', 'sdfsfd', 23423, '123'),
(49, 'asdasdas', 'hiransanjeesad', '2343434343', 'dsad', 'asdaads', 'asdasd', 'asdasd', 'adsdsa', 4324, '123'),
(50, 'asdasd', 'hiranjeewaa@gmail.com', '3454544535', 'asdadas', 'dsasda', 'xcvxcv', 'vxcv', 'cvxcv', 34545, '123');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `units` int(11) NOT NULL,
  `paymentMethod` enum('cash on dilivery','card payment') NOT NULL,
  `orderStatus` enum('Shipped','Yet to pack','Yet to ship','Dilivered') NOT NULL DEFAULT 'Yet to pack'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `customerID`, `productID`, `units`, `paymentMethod`, `orderStatus`) VALUES
(1, 1, 1, 12, 'cash on dilivery', 'Yet to ship'),
(2, 1, 2, 10, 'card payment', 'Shipped'),
(3, 37, 11, 1, 'card payment', 'Yet to pack'),
(4, 37, 3, 1, 'card payment', 'Yet to pack'),
(5, 37, 65, 5, 'cash on dilivery', 'Yet to pack'),
(6, 37, 2, 1, 'card payment', 'Yet to pack'),
(7, 37, 43, 7, 'card payment', 'Yet to pack');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `secondaryName` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `price` varchar(5) NOT NULL,
  `weight` varchar(4) NOT NULL,
  `availableUnits` int(11) NOT NULL,
  `numberOfOrders` int(11) DEFAULT NULL,
  `category` enum('other','Cars and vehical','Construction toys','Dolls','Educational toys','Electronic toys','Food-related toys','Puzzle/assembly','Science and optical','Sound toys','Spinning toys','Wooden toys','Animals','Creative toys') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `name`, `secondaryName`, `description`, `price`, `weight`, `availableUnits`, `numberOfOrders`, `category`) VALUES
(1, 'Kids Jeep', 'Kids Jeep/ Car/ Vehicle', 'Baybee Magento Rechargeable Battery Operated Jeep for Kids, Ride on Toy Kids Car with Bluetooth & Music| Baby Big Battery Car | Electric Jeep Car for Kids to Drive 3 to 8 Years Boys Girls (Blue II)\r\n', '10', '0.5', 0, 118, 'other'),
(2, 'Flying Helicopter', 'Remote Control Mini Drone Flying Helicopter', 'Remote Control Mini Drone Flying Helicopter Infraed Induction Kid Toys Aircraft LED Drone Flying Suspension Induction Helicopter', '12', '0.25', 219, 202, 'other'),
(3, 'Alloy Finger Bicycle', 'Bicycle Diecast Metal Bike Model Racing Toy', 'Alloy Finger Bicycle Diecast Metal Bike Model Racing Toy Simulation Collection Toys for Children Adult Mini Desk Funny Bike', '7', '0.2', 161, 244, 'other'),
(4, 'Remote Control Car', 'Remote Control Car', 'Remote Control Car Children\'s Toys For Boys Kids Birthday Gifts Sports Vehicle Charging Can Open the Door', '9.60', '0.5', 222, 24, 'Cars and vehical'),
(5, 'HUINA 1569 RC Bulldozer', 'HUINA 1569 RC Bulldozer', 'HUINA 1569 RC Bulldozer 1:16 8CH Remote Control Truck 2.4G Radio Engineering Vehicle Boy Hobby Car Toys For Children Gifts', '58.62', '0.6', 250, 36, 'Cars and vehical'),
(6, 'Big Size Music Boat ', 'Big Size Music Boat Simulation Track Inertia Toy ', 'Big Size Music Boat Simulation Track Inertia Toy with 3 Cars and 1 Plane Story Lighting Ship Model Kids Early Educational Toy', '26.24', '0.65', 222, 20, 'Cars and vehical'),
(7, 'HUIQIBAO Super Armor Robot', 'HUIQIBAO Super Armor Robot', 'HUIQIBAO 1450PCS City War Super Armor Robot Building Blocks Military Warrior Mecha Figures Weapon Bricks Toys For Children Gifts', '21.19', '0.8', 188, 108, 'Construction toys'),
(8, 'Magnetic Constructor Blocks', 'Magnetic Constructor Blocks', 'Magnetic Constructor Blocks Set Building Block Game Big Size DIY Magnet Stick Rod Montessori Educational Toys For Children Gift', '7.54', '0.38', 146, 50, 'Construction toys'),
(9, 'DIY 1000 PCS classical parts', 'DIY 1000 PCS classical parts', 'DIY 1000 PCS classical parts model building blocks education ideased kits pieces city creative adult toys MOC Designer creative', '17.15', '0.6', 219, 126, 'Construction toys'),
(10, 'ICY DBS Blyth Doll ', 'ICY DBS Blyth Doll ', 'ICY DBS Blyth Doll customized joint doll 30cm Suitable For Dress up by yourself DIY Change 1/6 BJD Toy special price', '26.91', '0.47', 244, 123, 'Dolls'),
(11, 'BJD Doll', 'BJD / SD Doll', '1/4 BJD Doll BJD / SD Doll Fashion Reborn Doll Makeup For Baby Girl Gift', '79.13', '0.44', 131, 33, 'Dolls'),
(12, 'Babys Reborn Doll', ' Silicone Reborn Baby Doll', 'Babys Reborn Doll 45/58cm Silicone Reborn Baby Doll Adorable Lifelike Toddler Bonecas Girl Menina De Surprice Doll with Giraffe', '44.32', '0.67', 85, 7, 'Dolls'),
(13, 'Sticky Ball Dart Board', 'Sticky Ball Dart Board', 'Sticky Ball Dart Board Target Sports Game Toys For Children Outdoor Party Toys Target Sticky Ball Throw Educational Board Games', '1.59', '0.45', 136, 110, 'Educational toys'),
(14, 'Creative Painting Toys', 'Creative Painting Toys', 'Creative Painting Toys for Children 3 Level Dimmable Large Size Led Drawing Board USB Power Charge Learning Education Copy Board', '12.58', '0.74', 94, 26, 'Educational toys'),
(15, 'Large Particle Building Blocks', 'Large Particle Building Blocks', 'Large Particle Building Blocks Brick Marble Race Run Block 56-100pcs e Funnel Slide Blocks DIY Bricks Children Big Size Toys', '14.24', '0.5', 50, 5, 'Educational toys'),
(16, 'Technical Buggy Car', 'Technical Buggy Car', 'Technical Buggy Car K96116 APP Remote Control Moter Power Building Blocks Bricks Programming Gift Sets Toys For Children Kids', '45.05', '0.5', 202, 146, 'Electronic toys'),
(17, 'RC Excavator Dumpe', 'RC Excavator Dumpe', 'RC Excavator Dumper RC Car Toy 2.4G Remote Control Engineering Vehicle Crawler Truck Bulldozer Children Toys for Boys Kids Gifts', '29.08', '0.82', 188, 56, 'Electronic toys'),
(18, 'STEM Solar Robot', 'STEM Solar Robot', 'STEM Solar Robot Educational Toys Technology Science Kits Learning Development Scientific Fantasy Toy for Kids Children Boys', '15.12', '0.82', 155, 110, 'Electronic toys'),
(19, 'Children play kitchen', 'Children play kitchen', 'Children Simulation Pretend Play Kitchen Toy Cookware Set Cooking Food Fruit Vegetable Play House Early Educational Toys For Kid\r\n', '16.19', '0.27', 136, 92, 'Food-related toys'),
(20, 'Coffee Machine Kitchen Toy Set', 'Coffee Machine Kitchen Toy Set', 'New Girl Toys Kids Coffee Machine Kitchen Toy Set Simulation Food Cake Pretend Play Shopping Cash Register Toy For Children Gift\r\n', '23.99', '0.27', 72, 5, 'Food-related toys'),
(21, 'Stack Up Play Ice Cream Tower ', 'Stack Up Play Ice Cream Tower ', 'Stack Up Play Ice Cream Tower Simulation Food Toy Ice Cream Pretend Play Educational Toys Xmas Gift for Children Kids Board Game', '3.26', '0.22', 94, 7, 'Food-related toys'),
(22, 'Puzzle Games Brain Teasers', 'Puzzle Games Brain Teasers', 'Wooden Puzzle Games Brain Teasers Toy 3D Logic Puzzle Wood Snake Cube Magic Cube Ball Intellectual Removing Assembling Toy', '2.14', '0.38', 70, 10, 'Puzzle/assembly'),
(23, 'Puzzles for Adults ', 'Puzzles for Adults ', 'Puzzles for Adults 1000 Pieces Paper Jigsaw Puzzles Educational Intellectual Decompressing DIY Large Puzzle Game Toys Gift', '9.94', '0.55', 218, 153, 'Puzzle/assembly'),
(24, 'Kids 3D Puzzle Cartoon House', 'Kids 3D Puzzle Cartoon House', 'Kids 3D Puzzle Cartoon House Castle Building Model DIY Handmade Early Learning Educational Toys Gift for Children', '2.94', '0.35', 154, 111, 'Puzzle/assembly'),
(25, 'Assembly Education Puzzle ', 'Assembly Medical Early Education Puzzle Model Toy', 'Children Enlightenment Science And Education Human Organ Model Decoration DIY Assembly Medical Early Education Puzzle Model Toy', '10.08', '0.6', 85, 12, 'Science and optical'),
(26, 'kids Solar Energy Toy', 'kids Solar Energy Experiment Toy', 'Kids Montessori Toy Solar Energy Experiment Model Learning Education Physics Teaching Aids Educational Science Toys For Children', '18.13', '0.57', 52, 5, 'Science and optical'),
(27, 'Children Microscope Kit', 'Children Microscope Kit', 'Children Biological Microscope Kit LED Microscope Kit Lab 100X 400x 2000X Home School Science Educational Toy For Kids Gift', '15.48', '0.8', 66, 7, 'Science and optical'),
(28, 'Baby Phone Toy', 'Baby Phone Toy Telephone', 'Baby Phone Toy Telephone Music Sound Machine for for Kids Infant Early Educational Mobile Phone Toys Gift', '4.87', '0.25', 236, 196, 'Sound toys'),
(29, '16-Hole Wooden Harmonica', '16-Hole Wooden Harmonica', '16-Hole Wooden Harmonica Cartoon Animals Painted Toy Musical Instrument Play Kids Early Educational Toys for Children Gifts', '1.49', '0.12', 123, 55, 'Sound toys'),
(30, ' Musical Instrument ', 'Multifunction Musical Instrument', '4 Styles Double Row Multifunction Musical Instrument Piano Mat Infant Fitness Keyboard Play Carpet Educational Toys For Kids', '9.50', '0.44', 66, 23, 'Sound toys'),
(31, 'Light Up Spinning Tops ', 'Light Up Spinning Tops ', 'Light Up Spinning Tops Luminous Colorful Top Ejection Toy Classic Gyroscope Novelty Bulk Toys Party Favors for Kids Children', '1.56', '0.25', 116, 75, 'Spinning toys'),
(32, 'Suction Cups Spinning Top ', 'Suction Cups Spinning Top ', '1pcs Suction Cups Spinning Top Toy For Baby Game Infant Teether Relief Stress Educational Rotating Rattle Bath Toys For Children', '1.86', '0.2', 35, 2, 'Spinning toys'),
(33, 'Metal Spinning Toys', 'Metal Spinning Toys', 'Metal Spinning Toys for Children Adult Antistress Gyroscope Office Party Game Like Foreverspin Forever Spin Top Spinner Gyro Toy\r\n', '1.89', '0.6', 99, 23, 'Spinning toys'),
(34, 'Wooden Puzzle 3D', 'Wooden Puzzle 3D', 'Wooden Puzzle 3D Alphabet Number Shape Matching Busy Board Game Montessori Baby Toys Early Education Learning Toys for Children', '3.55', '0.3', 100, 66, 'Wooden toys'),
(35, 'Wooden Rainbow Stones ', 'Wooden Rainbow Stones ', 'Wooden Rainbow Stones Building Blocks Colorful Wood Toy Block Stacker Balancing Games Montessori Educational Toys for Children', '12.66', '0.6', 188, 120, 'Wooden toys'),
(36, 'Kids Wooden Domino ', 'Kids Wooden Domino ', 'Kids Wooden Domino Institution Accessories Organ Blocks Rainbow Jigsaw Dominoes Montessori Educational Wood Toys for Children', '8.88', '0.6', 107, 22, 'Wooden toys'),
(37, 'Disney Pixar Cars', 'Disney Pixar Cars', 'Disney Pixar Cars 2 3 Lightning McQueen Helicopter Planes Alloy Metal Model Metal Toys Vehicles Boy Children Birthday Gifts', '3.99', '0.4', 120, 83, 'Cars and vehical'),
(38, 'New Suzuki Alloy Car', 'New Suzuki Alloy Car', '1:26 New Suzuki Jimny Off-Road SUV Alloy Car Model Diecast Metal Vehicle High Simulation Sound Light Collection Kids Toy Gift', '12.77', '0.35', 110, 55, 'Cars and vehical'),
(39, 'Large Car Transporter Truck', 'Large Car Transporter Truck', 'Large Car Transporter Truck Folding Deformation Big Lloy Sports Cars Model Multi-Function Trucks Toy Children\'s Educational Gift\r\n', '30.96', '0.54', 95, 5, 'Cars and vehical'),
(40, 'Car Game Toys', 'Car Game Toys', 'Car Game Toys for Boy Electronic Vehicle Driving Adventure Steering Wheel With Music Sound Effect Brain Games Toy Children Gifts', '31.03', '0.32', 107, 70, 'Cars and vehical'),
(41, 'Flexible Railway Car Toys', 'Flexible Railway Car Toys', 'Flexible Railway Car Toys Changeable Track with LED Light Race Car DIY Assembled Racing Track Set Creative Toy For Kids Children', '34.31', '0.6', 133, 85, 'Construction toys'),
(42, 'Super Wings Plane Robot', 'Super Wings Plane Robot', '36 Types Super Wings 2\" Scale Mini Transforming Anime Deformation Plane Robot Action Figures Transformation Toys For Kids Gifts', '4.99', '0.4', 144, 113, 'Construction toys'),
(43, 'Marble Race', 'Marble Race', '77-308PCS Marble Race Run Big Block Compatible city Building Blocks Funnel Slide Blocks DIY Big Bricks Toys For Children gift', '40.12', '0.65', 91, 55, 'Construction toys'),
(44, ' Kids Building Blocks Toy', ' Kids Building Blocks Toy ', 'Kids Building Blocks Toy Dream Dessert House Coffee Shop Building Kit Street-View Construction Educational Toy for Girls Age 6+', '6.55', '0.43', 55, 3, 'Construction toys'),
(45, 'Gabby Dollhouse Plush Toy', 'Gabby Dollhouse Plush Toy', '23-25CM Gabby Dollhouse Plush Toy Cartoon Season Stuffed Animals Mermaid Cat Plushie Dolls for Kids Christmas Birthday Gifts', '13.67', '0.12', 68, 42, 'Dolls'),
(46, ' Lovely Stuffed Girl Doll ', ' Lovely Stuffed Girl Doll Princess', '45cm Lovely Stuffed Girl Doll Princess Doll Plaid Skirt Doll Baby Plush Toy Kids Soft Toy Gifts for Children', '10.50', '0.35', 123, 100, 'Dolls'),
(47, 'White Goose Toy ', 'White Goose Toy ', 'INS Stuffed White Goose Toy for Baby Kids Animal Baby Accompanying Dolls Comfort Toys Children Xmas Gift Room Decoration', '14.99', '0.3', 70, 47, 'Dolls'),
(48, 'Mini Doll Toy ', 'Mini Doll Toy ', 'Mini Doll Toy Newborn Baby Mini Sleeping Rebirth Dolls Kids Girls Washable Realistic Silicone Dolls Miniature Doll Toys', '12.99', '0.32', 120, 105, 'Dolls'),
(49, 'Wooden Jigsaw Puzzle', 'Wooden Jigsaw Puzzle', 'Wooden Constructor Jigsaw Puzzle Wood Mini Puzzles for kids Children 3 5 Years', '3.43', '0.3', 60, 4, 'Educational toys'),
(50, 'Electric Magnetic Fishing', 'Electric Magnetic Fishing', 'Electric Magnetic Fishing With Music Toys for Boys Imitate Fish Rod Children Magnet Game Education Girl 3 Year Free Shipping', '29.89', '0.85', 58, 7, 'Educational toys'),
(51, 'Kids Engineering Vehicle', 'Kids Engineering Vehicle', 'Kids Engineering Vehicle Electric Drill Tool Toys Match Children Educational Assembled Sets Tools For Boys Nut Building Gift', '27.81', '0.77', 68, 9, 'Educational toys'),
(52, 'Sensory Rattle Teether ', 'Sensory Rattle Teether ', 'Baby Montessori Toys 0 12 Months Sensory Rattle Teether Grasping Activity Development Toys Silicone Teething Toys For Babies', '4.74', '0.12', 99, 56, 'other'),
(53, 'Dinosaur Fossil Excavation Kit', 'Dinosaur Fossil Excavation Kit ', 'Dinosaur Fossil Excavation Kit Toys Jurassic Animal Skeleton Model Kid Digging Archaeological Education Game Children Boy Gift', '8.48', '0.5', 44, 20, 'Educational toys'),
(54, 'Electronics Building Block Kit', 'Electronics Building Block Kit', 'New Compound Mode Switch Circuits Electronics Building Block Kit Scientific Experiment Educational Assembling Toy for Kid', '15.87', '0.34', 100, 54, 'Electronic toys'),
(55, 'Solar Robot Toy ', 'Solar Robot Toy ', '12 in 1 Science Experiment Solar Robot Toy DIY Building Powered Learning Tool Education Robots Technological Gadgets Kit for Kid', '11.70', '0.46', 111, 36, 'Electronic toys'),
(56, 'Walkie Talkie Children Toy', 'Walkie Talkie Children Toy', 'RETEVIS RT388 Walkie Talkie Children 2 Pcs Children\'s Radio Receiver Walkie-Talkie Kids Birthday Gift Child Toys for Boys Girls', '18.99', '0.3', 123, 100, 'Electronic toys'),
(57, 'Flying Robot Astronaut Toy', 'Flying Robot Astronaut Toy', 'Flying Robot Astronaut Toy Aircraft High-Tech Hand-Controlled Drone Interactive Dual Wings with Lights Outdoor GiftS for Kids', '9.37', '0.14', 147, 123, 'Electronic toys'),
(58, 'Rabbit Comforting Plush', 'Rabbit Comforting Plush', 'AUGLEKA Baby Toys Rabbit Comforting Plush Toy Short Plush Doll Baby Sleeping Super Soft Plush Toys for Children Birthday Gift', '4.88', '0.27', 113, 99, 'Animals'),
(59, 'Disney Cartoon Plush Dolls ', 'Disney Cartoon Plush Dolls ', 'Disney Cartoon Blue Pink Stitch Plush Dolls Anime Toys Lilo and Stitch 20CM Stich Plush Stuffed Toys Christmas Gifts for Kids', '4.36', '0.32', 105, 67, 'Animals'),
(60, 'Kawaii Mouse Plush', 'Kawaii Mouse Plush', 'Kawaii Mouse Plush Toys Cute Mice Stuffed Dolls Animals Plush Toy Soft Mouse Doll Baby Sleeping Toy Cloth for Kids Birthday Gift', '7.80', '0.32', 87, 22, 'Animals'),
(61, 'Spongebob Squarepants', 'Spongebob Squarepants', 'Spongebob Squarepants Patrick Eugene H. Krabs Gary Plush Doll Kawaii Kid Cartoon Anime Peripheral Toy Christmas Gift', '7.02', '0.28', 119, 88, 'Animals'),
(62, 'Dinosaur Plush Toys', 'Dinosaur Plush Toys', '1pc 40-100cm New Dinosaur Plush Toys Cartoon Tyrannosaurus Cute Stuffed Toy Dolls for Kids Children Boys Birthday Gift', '6.27', '0.54', 142, 78, 'Animals'),
(63, 'Plush Elephant Toy', 'Plush Elephant Toy', 'Plush Elephant Toy Stuffed Animal Electric Educational Toy GUND Animated Flappy Baby Peekaboo Elephant Pat Ears Cover Eyes Dumbo', '14.12', '0.25', 45, 15, 'Animals'),
(64, 'Kitchen Kids play house', 'Kitchen Kids Play House', 'Kitchen Kids Mini Water Dispenser Electric Dishwasher Pretend Play House Games Role Playing Food Summer Kitchen Toys For Girls', '19.37', '.65', 100, 33, 'Food-related toys'),
(65, 'Children Hamburger Toys Set', 'Children Hamburger Toys Set', 'Children Hamburger Toys Set Play House Mini Artificial Food Fries Plastic Models Pretend Playset Kids Educational Toys Kit Gifts', '0.25', '.15', 55, 26, 'Food-related toys'),
(66, '8PCS Kitchen Food Toys', '8PCS Kitchen Food Toys', '8PCS Kitchen Food Toys Simulation Kitchenware Play Set Pretend Play Pot Steak Vegetable Bread Hot Dog Omelette Children Girl Toy', '2.24', '.2', 94, 34, 'Food-related toys'),
(67, 'Button Art Puzzle Toy', 'Button Art Puzzle Toy', 'Button Art Puzzle Toy for Toddlers Activities Crafts Color Matching Early Learning Educational Pegboard 46 Buttons 10 Pictures\r\n', '18.96', '.25', 46, 22, 'Puzzle/assembly'),
(68, '3D Wooden Puzzle Jigsaw Toy', '3D Wooden Puzzle Jigsaw Toy', '3D Wooden Puzzle Jigsaw Toy Montessori Baby Toys Wood Cartoon Animal Puzzles Game Kids Early Educational Toys for Children Gifts', '2.73', '0.22', 115, 52, 'Puzzle/assembly'),
(69, '3D Puzzle Math Toy', '3D Puzzle Math Toy', 'Colorful 3D Puzzle Wooden Tangram Math Toys Cube Game Children Pre-school Magination Shapes Puzzle Educational Toy for Kids', '4.20', '0.18', 3, 3, 'Puzzle/assembly'),
(70, 'Solar System Kit', 'Solar System Kit', 'Solar System Planetarium Model Kit Astronomy Science Project DIY Kids Gift Worldwide Sale Educational Toys For Child', '2.95', '0.48', 0, 5, 'Science and optical'),
(71, 'Desk Toy Color Cube', 'Desk Toy Color Cube', 'Stress Relief Desk Toy Color Cube Prism Primary Colour Science Optical Illusion Juguete Sensorial Autismo Antistress Adults Kids', '10.55', '0.2', 10, 2, 'Science and optical'),
(72, 'Physics Stem Science Toys', 'Physics Stem Science Toys', 'Kids Physics Stem Science Toys Optical Prism with Bracket K9 Crystal Prism Instrument Photography Rainbow Mitsubishi Mirror', '4.73', '0.35', 12, 2, 'Science and optical'),
(73, 'Hand Pressing Desk Bell', 'Hand Pressing Desk Bell', '7CM Hand Pressing Desk Bell Service Bell Answer Bell Kids Toys for Classroom Game Restaurant Reception Kitchen Bar Trainer', '3..95', '0.28', 35, 10, 'Sound toys'),
(74, 'Ocean Light Musical Toys', 'Ocean Light Musical Toys', 'Baby Toys 1-3 Years Babies Ocean Light Rotary Projector Musical Toys Montessori Early Educational Sensory Toys for Toddler Gifts', '19.38', '0.52', 12, 5, 'Sound toys'),
(75, 'Bell Communication Toys', 'Bell Communication Toys', 'Recordable Pet Starter Talking Speaking Voice Buttons Dog Intelligence Training Bell Communication Toys 20S Command Recording', '1.33', '0.12', 124, 45, 'Sound toys'),
(76, 'Magic Rotating Bean Puzzle Toy', 'Magic Rotating Bean Puzzle Toy', 'Magic Rotating Bean Puzzle Toy Game Kids Adults Fingertip Fidget Stress Relief Game Montessori Education Toys For Children Gift', '1.99', '0.12', 67, 23, 'Spinning toys'),
(77, 'Colorful Flashing Music Toys', 'Colorful Flashing Music Toys', '3pcs Colorful Flashing Music Gyro LED Shining Gyrator Toys Spinning Top Classic Gyroscope Toys Random Color Style', '5.88', '0.21', 34, 14, 'Spinning toys'),
(78, 'Mixed Doll Toy Ball', 'Mixed Doll Toy Ball', '1-30pcs NEW 47mm Gacha Mixed Doll Toy Ball Transparent Capsule Surprise Egg Model Puppets Toys for Kids Playground Game Machine', '10.42', '0.25', 149, 102, 'Spinning toys'),
(79, 'Luminous Sticky Ball', 'Luminous Sticky Ball', '5/10pcs Luminous Sticky Ball Toys 4.5cm Sticky Wall Home Party Games Glow in the Dark Novelty Toys Decompression Squeeze Toy', '4.79', '0.30', 138, 120, 'Spinning toys'),
(80, 'Wooden Hockey Table', 'Wooden Hockey Table', 'Fast Sling Puck Game Paced Wooden Table Hockey Winner Games Interactive Chess Toys For Adult Children Desktop Battle Board Game', '9.51', '0.72', 43, 25, 'Wooden toys'),
(81, 'Mini Wooden Tools Kit', 'Mini Wooden Tools Kit', '5Pcs Mini Wooden Hammer Mallet Carving Supplies for Crushing Chocolate Nuts Seafood Tools Diy Baking Crafts Kids Toys', '2.47', '0.18', 102, 40, 'Wooden toys'),
(82, 'Moon Balance Blocks Board', 'Moon Balance Blocks Board', 'Montessori Wooden Toys for Baby Stars Moon Balance Blocks Board Games Educational Toys Children Stacking High Blocks Constructor', '13.18', '0.15', 65, 18, 'Wooden toys'),
(83, 'Magnetic Drawing Board', 'Magnetic Drawing Board', 'Magnetic Drawing Board Ball Sketch Pad Tablet with Magnet Pen Kids Learning Educational Toys for Children Gift Magpad Creative', '9.25', '0.2', 50, 22, 'Creative toys'),
(84, 'Forklift Vehicles kit', 'Forklift Vehicles kit', '9 Styles Alloy Engineering Car Truck Toys Crane Bulldozer Excavator Forklift Vehicles Educational Toys for Boys Kids Gift', '7.79', '0.38', 28, 4, 'Creative toys'),
(85, 'Spirograph Drawing toys set', 'Spirograph Drawing toys set', '22pcs Spirograph Drawing toys set Interlocking Gears & Wheels Drawing Accessories Creative Educational Toy For children', '3.99', '0.08', 89, 72, 'Creative toys'),
(86, 'Magnetic Constructor Block Set', 'Magnetic Constructor Blocks Se', 'Magnetic Constructor Blocks Set Building Block Game Big Size DIY Magnet Stick Rod Montessori Educational Toys For Children Gift', '7.20', '0.18', 43, 28, 'Creative toys'),
(87, 'Smart Puzzle Cube', 'Smart Puzzle Cube', 'New 3x3 Smart Puzzle Cube 3x3x3 cube decompression game Breakthrough Electric Intelligent Voice Cube Children\'s Educational Toys', '22.65', '0.12', 0, 3, 'Creative toys'),
(88, 'Writing Tablet Drawing Board', 'Writing Tablet Drawing Board', '8.5/10/12inch Writing Tablet Drawing Board Children\'s Graffiti Sketchpad Toys Kids Educational Toys Lcd Handwriting Blackboard', '10.99', '0.9', 40, 16, 'Creative toys'),
(89, 'Pop Tubes Fidget Toys', 'Pop Tubes Fidget Toys', '8Pack Large Pop Tubes Fidget Toys Sensory Toy for Stress Anxiety Relief for Children Adults Learning Toys Toddlers Stretch Tube', '2.03', '0.05', 142, 138, 'Creative toys');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
