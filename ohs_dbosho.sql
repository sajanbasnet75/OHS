-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2017 at 06:52 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ohs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `emp_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `day` varchar(10) CHARACTER SET utf8 NOT NULL,
  `time` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `payment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`emp_id`, `patient_id`, `day`, `time`, `date`, `payment`) VALUES
(2, 1, '5', '9-10', '2017-02-02', 0),
(2, 1, '5', '10-11', '2017-02-02', 0),
(1, 1, '1', '10-11', '2017-03-12', 0),
(1, 1, '1', '10-11', '2017-03-12', 0),
(1, 1, '1', '10-11', '2017-03-12', 0),
(1, 1, '5', '10-11', '2017-02-02', 0),
(1, 1, '5', '10-11', '2017-02-02', 0),
(1, 1, '5', '10-11', '2017-02-02', 0),
(1, 1, '5', '10-11', '2017-02-02', 0),
(1, 1, '3', '10-11', '2017-04-11', 0),
(1, 1, '4', '10-11', '2017-04-05', 0),
(1, 1, '7', '12-13', '2017-04-01', 0),
(1, 1, '7', '10-11', '2017-04-22', 0),
(1, 1, '5', '10-11', '2017-04-06', 0),
(1, 1, '6', '11-12', '2017-02-03', 0),
(1, 1, '5', '10-11', '2017-02-02', 0),
(1, 1, '5', '11-12', '2017-02-02', 0),
(1, 1, '7', '13-14', '2017-04-29', 0),
(1, 1, '3', '10-11', '2017-04-04', 0),
(1, 1, '4', '10-11', '2017-04-05', 0),
(1, 1, '5', '11-12', '2017-02-02', 0),
(1, 1, '5', '10-11', '2017-04-13', 0),
(1, 1, '3', '10-11', '2017-04-11', 0),
(1, 1, '4', '10-11', '2017-04-05', 0),
(1, 1, '3', '13-14', '2017-04-04', 0),
(2, 1, '3', '12-13', '2017-04-04', 0),
(1, 1, '4', '11-12', '2017-07-12', 0),
(1, 1, '6', '10-11', '2016-01-01', 0),
(1, 1, '3', '10-11', '1996-12-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `asked_questions`
--

CREATE TABLE IF NOT EXISTS `asked_questions` (
  `user_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL AUTO_INCREMENT,
  `ques_topic` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ques_details` varchar(400) CHARACTER SET utf8 NOT NULL,
  `symptoms` varchar(100) CHARACTER SET utf8 NOT NULL,
  `field` varchar(33) CHARACTER SET utf8 NOT NULL,
  `sex` text CHARACTER SET utf8 NOT NULL,
  `date` varchar(33) CHARACTER SET utf16 NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`ques_id`),
  UNIQUE KEY `ques_topic` (`ques_topic`),
  KEY `ques_topic_2` (`ques_topic`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `asked_questions`
--

INSERT INTO `asked_questions` (`user_id`, `ques_id`, `ques_topic`, `ques_details`, `symptoms`, `field`, `sex`, `date`, `age`) VALUES
(16, 1, 'why do i have a headache every morning?', 'i have a sever headache every morning.Please help me', 'headache,dizziness', 'Nureologist', 'Male', '2017 Jun 11', 22),
(19, 2, 'Cheast pain', 'i have a cheast pain occassionally.What should i do?', 'cheast pain,heart burn', 'Cardiologist', 'male', '2017 Jun 11 ', 5),
(16, 3, 'Pain in the knees', 'i have pain in both knees since last week.What should i do to get rid of it?Please help!', '', 'Orthopedician', 'Male', '2017 Jun 13', 22);

-- --------------------------------------------------------

--
-- Table structure for table `doc_schedule`
--

CREATE TABLE IF NOT EXISTS `doc_schedule` (
  `emp_id` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `time` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_schedule`
--

INSERT INTO `doc_schedule` (`emp_id`, `day`, `time`) VALUES
(1, '3', '10-15'),
(2, '3', '9-13');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `username`, `password`) VALUES
(1, 'doc1', '83e4b1789306d3d1c99140df3827d600'),
(2, 'doc2', '271559ec25268bb9bb2ad7fd8b4cf71a'),
(3, 'doc3', '271559ec25268bb9bb2ad7fd8b4cf71a');

-- --------------------------------------------------------

--
-- Table structure for table `employee_detail`
--

CREATE TABLE IF NOT EXISTS `employee_detail` (
  `emp_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(32) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` int(11) NOT NULL,
  `field` varchar(32) NOT NULL,
  `history` text NOT NULL,
  `images` varchar(33) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_detail`
--

INSERT INTO `employee_detail` (`emp_id`, `name`, `dob`, `address`, `email`, `phone`, `field`, `history`, `images`) VALUES
(1, 'doc1', '2000-01-04', 'doc1add', 'doc1.com', 1, 'Cardiologist', 'M Sc. in cardiology', 'doc1.png'),
(2, 'doc2', '2000-01-04', 'doc2add', 'doc2.com', 2, 'Nureologist', 'M Sc. in Nureology', 'doc1.png'),
(3, 'doc3', '1990-11-09', 'baneshwor', 'doc1@gmail.comm', 324234, 'Cardiologist', 'Msc in cardiology', 'doc1.png');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(55) CHARACTER SET utf8 NOT NULL,
  `image` varchar(55) CHARACTER SET utf8 NOT NULL,
  `author` varchar(33) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `detail` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `image`, `author`, `date`, `detail`) VALUES
(1, 'blood donation program', '591c78b36a4145.96796654.png', 'Admin', '2017-05-01', 'A blood donation campaign is going to be held at inside Kathmandu Medical Care hospital. Please share the information. <br><br> Venue:KMC hospital,Kathmandu<br> Time: From 11:00am to 2:00pm'),
(2, 'के हुन्छ हृदयाघातमा ?', '591c7a62cc51e9.02169388.jpg', 'sajan basnet', '2017-05-11', 'रोकथाम र नियन्त्रण गर्न सकिने भए पनि मुटु रोग विश्वव्यापी रुपमा पुरुष तथा महिला दुवैको मृत्युको प्रमुख कारक हो । हरेक देशमा स्वास्थ्य सेवाका सुविधा, जनताको जीवनशैली र देशको आर्थिक स्तर फरक–फरक हुने हुँदा मृत्युको कारण पनि फरक हुने गर्छ । संसारभरि नै मुटुरोग सबैभन्दा ठूलो ज्यानमारा रोग बनेको छ । मुटुरोग पछि मस्तिष्काघात, श्वासप्रश्वासको संक्रमण, झाडापखाला, एचआईभी्एड्स, सवारी दुर्घटना र समय अगावैको जन्म अन्य मृत्युका कारण हुन् ।  मुटुरोगमध्ये हृदयाघात एक जटिल किसिमको आकस्मिक अवस्था हो । मुटुका रक्तनली अर्थात् धमनीहरू र मुटु मै रगत जमेर रक्तसञ्चार बन्द भई यस्तो अवस्था आउने गर्छ । मुटुमा आवश्यक रगतको आपूर्ति बन्द हुँदा मुटुका रक्त कोषिकाको क्षति हुने वा तिनीहरू मर्ने कारण मानिसको अचानक मृत्यु हुने जोखिम आइपर्न सक्छ ।<br><br>  वास्तवमा यदि कसैलाई दोस्रोपटक हृदयाघात भएको छ भने पहिलो हृदयाघातका जस्तै लक्षण देखा नपर्न सक्छन् । केही मानिसमा कुनै पनि लक्षण नै नदेखिन पनि सक्छ । यसलाई सुशुप्त हृदयाघात भनिन्छ । हृदयाघातको उपचार यसको प्रकृति र गम्भीरतामा निर्भर रहन्छ । हृदयाघातका प्रचलित उपचारमा रगत पातलो पार्ने अर्थात् जमेको रगतलाई पगाल्ने औषधीको प्रयोग ९जसलाई थ्रम्बोलाइसिस भनिन्छ, कार्डियाक इन्टरभेन्सन् अर्थात् कोरोनरी एन्जियोप्लाष्टि र मुटुको शल्यक्रियाजस्ता प्रक्रिया पर्छन् ।  एन्जियोग्राफी पश्चात् मुटुको ओपन हार्ट सर्जरी जस्ता प्रक्रिया पनि अपनाइन्छन् । यी प्रक्रियामध्ये मुटुका धमनीमा रोकावटका कारण रक्त प्रवाह बन्द भई हुने हृदयाघातको उपचारमा सबैभन्दा प्रचलित प्रक्रिया एन्जियोप्लाष्टी नै हो । उपचारको मुख्य उद्देश्य नै बिरामीलाई अकस्मात मृत्युबाट बचाउनु र भविष्यमा आइपर्न सक्ने मुटुरोगसम्बन्धी कुनै पनि जोखिमबाट बचाउनु हो । यो प्रक्रिया अपनाउँदा तिघ्राको कापमा वा दाहिने अथवा देब्रे हातमा एउटा सानो प्वाल पारिन्छ । बिरामीको पीडा वा दुखाई कम गर्न प्वाल पारिने स्थानमा लठ्याउने औषधी दिइन्छ ।  <br><br> के गरिन्छ एन्जियोप्लाष्टीमा ?<br>  एन्जियोप्लाष्टीमा क्याथेटर भनिने एउटा सानो ट्युब बिरामीको मुटुको धमनीसम्म पठाइन्छ । मुटुको एक्स–रे लिंदै क्याथेटरलाई बन्द भएको वा साँघुरिएको धमनीसम्म पु¥याइन्छ । बन्द भएको धमनीको भाग पत्ता लगाइसकेपछि क्याथेटरको टुप्पोमा रहेको बेलुनलाई फुलाइन्छ र बन्द भएको वा साँघुरिएको धमनीलाई खोलिन्छ । यसरी बन्द भएको भाग खोलेपछि मुटुमा रक्तप्रवाह पुनः स्थापित गराइन्छ । धमनीको बन्द भएको वा साँघुरिएको भाग पुनः बन्द नहोस् भन्नका लागि त्यहाँ एउटा ‘स्टेन्ट’ जडान अर्थात् प्रत्यारोपण गरिन्छ ।  स्टेन्ट हालसम्म जम्मा तीन किसिमका छन् । ती हुन् – औषधिरहित धातुको स्टेन्ट ९जुन सबैभन्दा सस्तो हुन्छ०, अर्को औषधी लेपन गरिएको स्टेन्ट (यो केही महँगो हुन्छ) र तेस्रो अत्याधुनिक मांसपेशीमै विलय हुने स्टेन्ट । तेस्रो किसिमको स्टेन्टले जडान गरिएको धमनीमा औषधिका माध्यमबाट यथेष्ठ रक्त प्रवाह गराइसकेपछि र चोट ठीक भइसकेपछि त्यही भागमा विलय भएर जान्छ ।  अनुसन्धानकर्ताहरूले के विश्वास गरेका छन् भने यस्तो किसिमको स्टेन्ट धमनीमा जडान गरिसकेपछि त्यस स्थानको रोकावट वा अवरोध खोल्न धातुको स्टेन्ट राखिरहनु पर्दैन । रक्तनलीहरूमा धातुको स्टेन्ट जडान गरेर छाड्नुपर्ने अवस्थाबाट यस खाले स्टेन्टले बिरामीलाई राहत दिन सक्छ । रक्तनलीहरू आफ्नो पूरानै अवस्थामा फर्कने सम्भावना रहन्छ र भविष्यमा आइपर्न सक्ने त्यस खाले प्रक्रियाहरूबाट समेत बिरामीलाई जोगाउँदछ । स्टेन्ट जडान गरिसकेपछि क्याथेटरलाई झिकिन्छ र सामान्यतः यो प्रक्रिया पूरा हुन २० देखि ४५ मिनेटको समय लाग्दछ । तर कहिलेकाँही प्राविधिक रुपले जटिल अवस्था सृजना भई धेरै समय लाग्ने गर्दछ ।  ९६ प्रतिशतभन्दा बढी एन्जियोप्लाष्टी प्रक्रिया तत्कालै सफल हुन्छन् । रोकावट भएको धमनीबाट रक्तप्रवाह सुचारु भएपछि बिरामीले तत्कालै राहत पाउने, सामान्य अवस्थामा फर्कने र उसको छाति दुखाई ९एन्जाइना० कम हुन्छ । तर जटिल प्रकृतिका धमनीका रोग भएका बिरामी भने पूर्णतया ठीक नहुन पनि सक्छन् तर पनि तिनमा रोगको लक्षण भने कम हुँदै जान्छ र तिनीहरूलाई सक्रिय र सहज जीवन जीउन सजिलो पर्छ । मुटुको शल्यक्रिया गरेको अवस्थामा भन्दा एन्जियोप्लाष्टी गर्दाको अवस्थामा बिरामीहरू चाँडै निको हुन्छन् । धेरैजसो बिरामी एन्जियोप्लाष्टी गरेको दिन घर फर्कन सक्छन् भने केही बिरामी एन्जियोप्लाष्टि गरेको दोस्रो बिहान फर्कन्छन् ।  जनताका लागि मेडिकल इन्सुरेन्स नगरेको हाम्रो जस्तो देशमा एन्जियोप्लाष्टी प्रक्रिया निकै महँगो सावित हुन्छ । त्यो हाम्रा लागि नकारात्मक पक्ष हो । अर्कोतर्फ धमनी धेरै साँघुरिएका वा बन्द भएका बिरामीमा एन्जियोप्लाष्टी प्रक्रिया त्यति फलदायी नहुन सक्छ । त्यसरी नै खोलिएको धमनी एन्जियोप्लाष्टी पछि पुनः बन्द हुने वा साँघुरिने सम्भावना रहन्छ । धमनी पुनः साँघुरिएको वा बन्द भएको अवस्थामा बिरामीलाई पुनः छाति दुख्ने हुन्छ र फेरि हृदयाघात हुन पनि सक्छ । पुनः बन्द भएको धमनीलाई दोस्रो एन्जियोप्लाष्टी वा कहिलेकाँही मुटुको बाइपास शल्यक्रिया वा औषधि उपचारबाट कम गर्न सक्छ ।  एन्जियोप्लाष्टीपछि के गर्ने ?<br><br>  एन्जियोप्लाष्टी गरिसकेपछि आफ्नो जीवनशैलीमा सुधार ल्याएर आहार–व्यवहारमा नियन्त्रण गरेर वा शारीरिक क्रियाकलाप बढाएर आफूलाई स्वस्थ र स्फूर्त राख्नुपर्छ । नियमित रुपमा चिकित्सकको सम्पर्कमा रहने र सल्लाह अनुसार कोपिडग्रेल र एस्पीरिन जस्ता औषधि चिकित्सकको अनुमति बिना छाड्नु हुँदैन । त्यसका साथसाथै धू्रमपान त्याग्ने, चिनीको रोग भए नियन्त्रणमा राख्ने, रक्तचाप भए नियमित परीक्षण गर्ने र आफ्नो शारीरिक तौल बढ्न नदिने गर्नुपर्छ । साथै बोसोयुक्त खाना र कोलेस्टेरोल बढ्ने खाना पूर्णतया बन्द गर्नुपर्छ । मांसहारी भए रातो मासु नखाने, चिल्लोयुक्त दुग्ध पदार्थ ९चिज, घ्यू० नखाने र बजारमा पाइने तयारी खाना बन्द गर्नुपर्ने हुन्छ । त्यसको बदलामा दैनिक रुपमा ताजा साजसब्जी र फलफूलमा वृद्धि गर्ने र मद्यपान गर्ने बानी छ हार्ड ड्रिङ्सको सट्टा निश्चित मात्रामा रेड वाइनजस्ता पेय पदार्थ लिने बानी बसाल्नुपर्छ ।  भविष्यमा आफूलाई तन्दुरुस्त राख्न आजैबाट नियमित रुपमा व्यायाम गर्ने बानी बसाल्नुहोस् । याद रहोस् शारीरिक व्यायामले तपाईको मुटुलाई रक्षा गर्नुका साथै शरीरको शक्ति सन्तुलन र मानसिक शान्तिका लागि सकारात्मक भूमिका खेल्छ । दैनिक हिंड्नु व्यायामको एक सजिलो उपाय हो । यदि तपाई ठूलाठूला भवनमा माथि चढ्दा लिफ्टको प्रयोग गर्नुहुन्छ भने त्यसलाई छाडेर भ¥याङ्गबाटै माथि चढ्ने, कतै जाँदा बस अथवा कारमा यात्रा गर्नुभन्दा हिंडेर जाने बानी गर्नु उपयुक्त हुन्छ ।  <br><br> के हुन्छ हृदयाघातमा ?<br>  हृदयाघात भएका बेला त्यसका लक्षण करिब ३० मिनेट वा बढी समयसम्मका लागि रहनसक्छ । हृदयाघात हुने बेलामा सामान्यतया छातिमा असजिलो हुने, रक्तचाप बढ्ने, सबै छाति गह्रुँगो भएको महसुस हुने र छाति दुख्ने हुन्छ । पाखुरा वा छातिको करङको तल्लो भाग दुख्ने अथवा दुखाई सर्दै गएर पिठ्यूँ, बँगारा, गर्धन अथवा हाततिर पुग्ने वा समग्रमा सबैतिर दुख्ने, अपच हुने, श्वास फेर्न गा¥हो भएको महसूस हुने, चिटचिट पसिना आउने, वाकवाकी लाग्ने, बान्ता हुने, झुम्म लागेजस्तो हुने, कमजोरी हुने, बेचैनी हुने, स्वाँस्वाँ बढ्ने र मुटुको धड्कन छिटोछिटो हुने वा अनियमित हुने जस्ता लक्षण देखा पर्छन् ।  जेसुकै भएपनि यदि तपाईलाई हृदयाघात भएको शंका भएमा तत्कालै हृदयरोग उपचार केन्द्रमा सम्पर्क गर्नुपर्छ । साथै त्यस अवस्थामा एक ट्याब्लेट एस्पिरिन ९३०० मिग्रा बिरामीलाई तत्कालै ख्वाइदिनु पर्छ । तत्कालै गरिएको उपचार बिरामीको मुटुमा धेरै हानी हुनुबाट जोगाउने एक उपयुक्त तरिका हुनसक्छ ।'),
(3, ' What is Diabetes?', '591c7fa02aa166.44643843.jpg', 'ram karmi', '2017-05-02', 'Diabetes can strike anyone, from any walk of life.  And it does – in numbers that are dramatically increasing. In the last decade, the cases of people living with diabetes jumped almost 50 percent – to more than 29 million Americans.    Worldwide, it afflicts more than 380 million people.  And the World Health Organization estimates that by 2030, that number of people living with diabetes will more than double. \r\n\r\nToday, diabetes takes more lives than AIDS and breast cancer combined -- claiming the life of 1 American every 3 minutes.  It is a leading cause of blindness, kidney failure, amputations, heart failure and stroke.   Living with diabetes places an enormous emotional, physical and financial burden on the entire family. Annually, diabetes costs the American public more than $245 billion.   \r\n\r\nJust what is diabetes?    \r\nTo answer that, you first need to understand the role of insulin in your body.    When you eat, your body turns food into sugars, or glucose. At that point, your pancreas is supposed to release insulin.    Insulin serves as a “key” to open your cells, to allow the glucose to enter -- and allow you to use the glucose for energy.    But with diabetes, this system does not work.    Several major things can go wrong – causing the onset of diabetes. Type 1 and type 2 diabetes are the most common forms of the disease, but there are also other kinds, such as gestational diabetes, which occurs during pregnancy, as well as other forms.   '),
(4, 'Kidney Transplant in Nepal is Now Free of Cost', '591c808f6c78c0.71428245.jpg', 'dr.kamal shrestha', '2017-05-04', 'Following the cost-free dialysis service introduced in Nepal last year, the Government has now made kidney transplants free in Nepal.  There is a prevalence of renal failure patients in Nepal. The rich ones may have it a little easier as they can afford to treatment. But those who aren’t very prosperous have been forced to live their lives supported by periodic dialysis just because they are unable to afford the cost of a kidney transplant.  It’s a good news to all of the kidney patients and their families that the Ministry of Health has brought forth a decision to make kidney transplants free in Nepal.  Health Minister, Gagan Thapa, said that the decision has been made to favor those who cannot afford to pay the kidney transplant costs.  “The decision has been made by the Ministry, other important preparations will be made to bring the decision into effect,” said Thapa.  However, there is one condition. To get the facility, it is mandatory that the transplant procedure is carried out within Nepal and not elsewhere.  According to Statistics, every year Nepal sees around 3000 patients with cases of kidney failure. However, only around 220 are known to have received treatment with a kidney transplant in Nepal or in any other country. Nepal has a total of 201 dialysers in 21 hospitals across the country. Around 1930 patients are using them for dialysis every year.  “We have increased the margins of receiving organs from a live donor. We have also made the necessary legal arrangements for taking organ donations from brain-dead patients,” said Thapa. He added, “I will be easier to receive organs for transplant and the transplant will be free of cost. It will make things much easier for kidney patients.”  According to Health Minister, the necessary steps are being taken to make sure the medicines the patients take post-operation are of good quality and are easily available.  Thapa also said that this step has been taken keeping long-term benefits in mind. “Instead of continuing life by means of dialysis, a transplant can help people return back to normal life,” Thapa said. “This will, in the long-term, increase productivity and reduce the cost of providing dialysis to patients.” He also said that even the experts suggested that instead of a free dialysis, a transplant can help patients return to work and help in the nation’s GDP.  In addition, the Ministry of Health is also taking forward the initiative to reduce the number of kidney patients and increase awareness about renal health among the general public.  The cost of kidney transplants are unbelievably high. Tribhuvan University Teaching Hospital charges around NPR 400,000 to 500,000 for the transplant, while the Human Organ Transplant Centre charges NPR 300,000. The HLA test done before the operation alone costs about NPR 100,000.  The initiative by Ministry of Health indeed is a good one. Now people will not have to worry about not being able to afford treatment. It will, surely, help in the overall health, well being and productivity of the country.');

-- --------------------------------------------------------

--
-- Table structure for table `news_comments`
--

CREATE TABLE IF NOT EXISTS `news_comments` (
  `news_id` int(11) NOT NULL,
  `comments_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(33) CHARACTER SET utf8 NOT NULL,
  `comments` varchar(200) CHARACTER SET utf8 NOT NULL,
  `date` varchar(33) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`comments_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `news_comments`
--

INSERT INTO `news_comments` (`news_id`, `comments_id`, `name`, `comments`, `date`) VALUES
(2, 29, 'dragon1542', 'ANOTHER COMMENT IN NEWS 2', '2017 Jun 11 at 09:18:28am'),
(4, 30, 'dragon1542', 'COMMENT IN NEWS4', '2017 Jun 11 at 09:19:15am'),
(2, 31, 'karmi214', 'comment in news 2', '2017 Jun 11 at 09:24:34am'),
(4, 32, 'karmi214', 'comment in news4', '2017 Jun 11 at 09:25:08am'),
(3, 33, 'karmi214', 'diabetes', '2017 Jun 11 at 11:41:03am'),
(3, 34, 'karmi214', '@Karmi214', '2017 Jun 11 at 11:41:17am'),
(2, 35, 'karmi214', 'good', '2017 Jun 11 at 09:05:44pm'),
(2, 36, 'karmi214', 'bad', '2017 Jun 11 at 09:05:58pm'),
(4, 37, 'doc1', 'nice\r\n', '2017 Jun 13 at 10:15:43am');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_detail`
--

CREATE TABLE IF NOT EXISTS `patient_detail` (
  `patient_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `sex` text CHARACTER SET utf8 NOT NULL,
  `blood_group` varchar(12) CHARACTER SET utf8 NOT NULL,
  `address` varchar(32) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phone` bigint(11) NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_detail`
--

INSERT INTO `patient_detail` (`patient_id`, `name`, `dob`, `age`, `sex`, `blood_group`, `address`, `email`, `phone`) VALUES
(10, 'user1', '2003-04-05', 13, 'Female', 'B-', 'address', 'asd', 3),
(16, 'Anish Karmi', '1995-12-24', 22, 'Male', 'O+', 'Battisputali', 'karmi214@gmail.com', 9808314356),
(18, 'sita', '1995-01-04', 22, 'female', 'A+', 'baneshwor', 'test3@gm.com', 1),
(19, 'ajay', '2012-02-02', 5, 'male', 'A-', 'sinamangal', 'assassin15423@gmail.com', 2147483647),
(20, 'sajan ', '1995-05-05', 22, 'male', 'A-', 'kapan', 'sajan@gmail.com', 123);

-- --------------------------------------------------------

--
-- Table structure for table `questions_answers`
--

CREATE TABLE IF NOT EXISTS `questions_answers` (
  `ans_id` int(11) NOT NULL AUTO_INCREMENT,
  `ques_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `name` varchar(33) NOT NULL,
  `field` varchar(33) NOT NULL,
  `doc_image` varchar(33) NOT NULL,
  `answer` varchar(1000) NOT NULL,
  `date` varchar(45) NOT NULL,
  PRIMARY KEY (`ans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `questions_answers`
--

INSERT INTO `questions_answers` (`ans_id`, `ques_id`, `emp_id`, `name`, `field`, `doc_image`, `answer`, `date`) VALUES
(9, 2, 1, 'doc1', 'Cardiologist', 'doc1.png', 'Hello!\r\nIf you are suffering from cheast pain occassionally then you should immediately consult a doctor.\r\nTake care\r\n', '2017 Jun 13'),
(10, 2, 3, 'doc3', 'Cardiologist', 'doc1.png', 'Hello! \r\nDoc 1 is absolutely right you should consult a doctor immediately.. \r\nTake care', '2017 Jun 13');

-- --------------------------------------------------------

--
-- Table structure for table `unverified`
--

CREATE TABLE IF NOT EXISTS `unverified` (
  `name` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `sex` char(1) NOT NULL,
  `dob` date NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `code` varchar(5) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `unverified`
--

INSERT INTO `unverified` (`name`, `username`, `email`, `sex`, `dob`, `phone`, `address`, `password`, `code`) VALUES
('sam', 'sam', 'sam@gmail.com', 'm', '2015-05-17', 98772345, 'kapan', 'sam', '33333');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `position` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `position`) VALUES
(1, 'doc1', '83e4b1789306d3d1c99140df3827d600', 'doctor'),
(2, 'doc2', '271559ec25268bb9bb2ad7fd8b4cf71a', 'doctor'),
(3, 'doc3', '271559ec25268bb9bb2ad7fd8b4cf71a', 'doctor'),
(10, 'user1', 'e4774cdda0793f86414e8b9140bb6db4', 'patient'),
(16, 'karmi214', '7d5660b9274696a075ea0ad6a4018e02', 'patient'),
(18, 'test3', '827ccb0eea8a706c4c34a16891f84e7b', 'patient'),
(19, 'dragon1542', '827ccb0eea8a706c4c34a16891f84e7b', 'patient'),
(20, 'sajan', '827ccb0eea8a706c4c34a16891f84e7b', 'patient');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
