-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: work
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `baoming`
--

DROP TABLE IF EXISTS `baoming`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `baoming` (
  `teach_no` char(20) DEFAULT NULL,
  `pname` char(15) DEFAULT NULL,
  `time` char(20) DEFAULT NULL,
  `field` char(20) DEFAULT NULL,
  `thing` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `baoming`
--

LOCK TABLES `baoming` WRITE;
/*!40000 ALTER TABLE `baoming` DISABLE KEYS */;
INSERT INTO `baoming` VALUES ('12345','adfasdfasdf','2021年5月16日晚','asdfasdf','asdfasdfasdf'),('123456','asdfasdfasdf','2021年5月17日','asdfasdfasdf','asdfasdf'),('1234567','asdfasdf','2024年某日','asdfasdf','asdfasdf'),('12345678','我就是测试用的','4545','1111111','asdf4324'),('123456789','能重名是因为就是能重名','4545','1111111','asdf4324'),('12345678910','asdf','4545','1111111','asdf4324'),('1234567891011','asdf','4545','1111111','asdf4324'),('123456789101112','asdf','4545','1111111','asdf4324'),('12345678910111213','asdf','4545','1111111','asdf4324'),('1234567891011121314','asdf','4545','1111111','asdf4324'),('1','测试用','4545','asdf','asdf'),('2','asdf','asdf','asdf','asdf'),('7777777','777','2077年7月7日','77城','7');
/*!40000 ALTER TABLE `baoming` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_1`
--

DROP TABLE IF EXISTS `bm_1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_1` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_1`
--

LOCK TABLES `bm_1` WRITE;
/*!40000 ALTER TABLE `bm_1` DISABLE KEYS */;
/*!40000 ALTER TABLE `bm_1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_12345`
--

DROP TABLE IF EXISTS `bm_12345`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_12345` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_12345`
--

LOCK TABLES `bm_12345` WRITE;
/*!40000 ALTER TABLE `bm_12345` DISABLE KEYS */;
INSERT INTO `bm_12345` VALUES ('致命打击','114514','河南人70');
/*!40000 ALTER TABLE `bm_12345` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_123456`
--

DROP TABLE IF EXISTS `bm_123456`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_123456` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_123456`
--

LOCK TABLES `bm_123456` WRITE;
/*!40000 ALTER TABLE `bm_123456` DISABLE KEYS */;
INSERT INTO `bm_123456` VALUES ('苟且偷生','114514','河南人70');
/*!40000 ALTER TABLE `bm_123456` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_1234567`
--

DROP TABLE IF EXISTS `bm_1234567`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_1234567` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_1234567`
--

LOCK TABLES `bm_1234567` WRITE;
/*!40000 ALTER TABLE `bm_1234567` DISABLE KEYS */;
INSERT INTO `bm_1234567` VALUES ('哈尔滨：化身为人','114514','河南人70');
/*!40000 ALTER TABLE `bm_1234567` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_12345678`
--

DROP TABLE IF EXISTS `bm_12345678`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_12345678` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_12345678`
--

LOCK TABLES `bm_12345678` WRITE;
/*!40000 ALTER TABLE `bm_12345678` DISABLE KEYS */;
/*!40000 ALTER TABLE `bm_12345678` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_123456789`
--

DROP TABLE IF EXISTS `bm_123456789`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_123456789` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_123456789`
--

LOCK TABLES `bm_123456789` WRITE;
/*!40000 ALTER TABLE `bm_123456789` DISABLE KEYS */;
/*!40000 ALTER TABLE `bm_123456789` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_12345678910`
--

DROP TABLE IF EXISTS `bm_12345678910`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_12345678910` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_12345678910`
--

LOCK TABLES `bm_12345678910` WRITE;
/*!40000 ALTER TABLE `bm_12345678910` DISABLE KEYS */;
/*!40000 ALTER TABLE `bm_12345678910` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_1234567891011`
--

DROP TABLE IF EXISTS `bm_1234567891011`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_1234567891011` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_1234567891011`
--

LOCK TABLES `bm_1234567891011` WRITE;
/*!40000 ALTER TABLE `bm_1234567891011` DISABLE KEYS */;
/*!40000 ALTER TABLE `bm_1234567891011` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_123456789101112`
--

DROP TABLE IF EXISTS `bm_123456789101112`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_123456789101112` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_123456789101112`
--

LOCK TABLES `bm_123456789101112` WRITE;
/*!40000 ALTER TABLE `bm_123456789101112` DISABLE KEYS */;
/*!40000 ALTER TABLE `bm_123456789101112` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_12345678910111213`
--

DROP TABLE IF EXISTS `bm_12345678910111213`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_12345678910111213` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_12345678910111213`
--

LOCK TABLES `bm_12345678910111213` WRITE;
/*!40000 ALTER TABLE `bm_12345678910111213` DISABLE KEYS */;
/*!40000 ALTER TABLE `bm_12345678910111213` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_1234567891011121314`
--

DROP TABLE IF EXISTS `bm_1234567891011121314`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_1234567891011121314` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_1234567891011121314`
--

LOCK TABLES `bm_1234567891011121314` WRITE;
/*!40000 ALTER TABLE `bm_1234567891011121314` DISABLE KEYS */;
/*!40000 ALTER TABLE `bm_1234567891011121314` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_2`
--

DROP TABLE IF EXISTS `bm_2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_2` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_2`
--

LOCK TABLES `bm_2` WRITE;
/*!40000 ALTER TABLE `bm_2` DISABLE KEYS */;
/*!40000 ALTER TABLE `bm_2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_2222`
--

DROP TABLE IF EXISTS `bm_2222`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_2222` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_2222`
--

LOCK TABLES `bm_2222` WRITE;
/*!40000 ALTER TABLE `bm_2222` DISABLE KEYS */;
/*!40000 ALTER TABLE `bm_2222` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_7777777`
--

DROP TABLE IF EXISTS `bm_7777777`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_7777777` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_7777777`
--

LOCK TABLES `bm_7777777` WRITE;
/*!40000 ALTER TABLE `bm_7777777` DISABLE KEYS */;
/*!40000 ALTER TABLE `bm_7777777` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_asdasdsdasd`
--

DROP TABLE IF EXISTS `bm_asdasdsdasd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_asdasdsdasd` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_asdasdsdasd`
--

LOCK TABLES `bm_asdasdsdasd` WRITE;
/*!40000 ALTER TABLE `bm_asdasdsdasd` DISABLE KEYS */;
/*!40000 ALTER TABLE `bm_asdasdsdasd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_dsd`
--

DROP TABLE IF EXISTS `bm_dsd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_dsd` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_dsd`
--

LOCK TABLES `bm_dsd` WRITE;
/*!40000 ALTER TABLE `bm_dsd` DISABLE KEYS */;
/*!40000 ALTER TABLE `bm_dsd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_qer34t`
--

DROP TABLE IF EXISTS `bm_qer34t`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_qer34t` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_qer34t`
--

LOCK TABLES `bm_qer34t` WRITE;
/*!40000 ALTER TABLE `bm_qer34t` DISABLE KEYS */;
/*!40000 ALTER TABLE `bm_qer34t` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bm_xxsdsd`
--

DROP TABLE IF EXISTS `bm_xxsdsd`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bm_xxsdsd` (
  `pname` char(30) DEFAULT NULL,
  `user_no` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bm_xxsdsd`
--

LOCK TABLES `bm_xxsdsd` WRITE;
/*!40000 ALTER TABLE `bm_xxsdsd` DISABLE KEYS */;
/*!40000 ALTER TABLE `bm_xxsdsd` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gly`
--

DROP TABLE IF EXISTS `gly`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gly` (
  `name` char(10) DEFAULT NULL,
  `password` char(20) DEFAULT NULL,
  `email` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gly`
--

LOCK TABLES `gly` WRITE;
/*!40000 ALTER TABLE `gly` DISABLE KEYS */;
INSERT INTO `gly` VALUES ('kk','00000000','869347974@qq.com'),('wind','66666666','869347974@qq.com'),('坤坤','88888888','869347974@qq.com'),('河南人','4.1056','869347974@qq.com'),('114514','asdf123','asdf123');
/*!40000 ALTER TABLE `gly` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stu`
--

DROP TABLE IF EXISTS `stu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stu` (
  `user_no` char(20) DEFAULT NULL,
  `password` char(25) DEFAULT NULL,
  `name` char(20) DEFAULT NULL,
  `sex` char(5) DEFAULT NULL,
  `scl` char(20) DEFAULT NULL,
  `class` char(10) DEFAULT NULL,
  `email` char(20) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stu`
--

LOCK TABLES `stu` WRITE;
/*!40000 ALTER TABLE `stu` DISABLE KEYS */;
INSERT INTO `stu` VALUES ('114514','asdf123','70','女','sx','3班','2499857309@qq.com','13234820318'),('32323','asdf123','asdf','男','fvvv','1班','2499857309@qq.com','15211111111'),('21323','asdf123','asdfasd','男','test1','1班','2499857309@qq.com','15211111111'),('20210502','4.1056','asdfas','男','ggssg','3班','41056@qq.com','15215102877'),('351312444','asdf123','344','男','test1','3班','114323514@qq.com','15211111111');
/*!40000 ALTER TABLE `stu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thing`
--

DROP TABLE IF EXISTS `thing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `thing` (
  `power` varchar(300) DEFAULT NULL,
  `thing_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thing`
--

LOCK TABLES `thing` WRITE;
/*!40000 ALTER TABLE `thing` DISABLE KEYS */;
INSERT INTO `thing` VALUES ('我是一坨可爱的便便',4),('我是超级傻X！！！啊啊啊啊啊啊啊啊手动阀手动阀啊手动阀啊手动阀阿斯蒂阀手动阀啊手动阀地方让他给窘境波极',18),('做了这坨稀饭，马上就被逐出项目组！\r\n我不做人了jojo!',19),('测试时的文本一定要很酷！！！！\r\n阿斯蒂芬奇偶iiiiiiiiiiiiiiiiiiiiiiiiiii哦i撒旦覅i脑袋vi福哦阿斯顿你发v哦啊哦i哦啊手动阀九年哦阿斯顿金佛年山东激发弄死v对加纳飞机上的念佛阿瑟东i飞机闹四大佛爱神的箭富农爱上见到的是佛i就阿森纳都i附近阿耨斯蒂芬健脑上帝就发你哦阿斯顿金佛弄i爱撒娇的念佛i骄傲大司农覅就埃斯农地方就阿斯哦的烦恼哦啊伺机待发弄i氨基酸的非农i叫阿三的非农i叫阿三的弄覅就阿松递减法弄四代机佛爱上你的金佛按i圣诞节佛i阿娇大司农覅就啊上的农房建设欧迪芬静安寺农地就烦恼司搭街坊弄阿斯顿就烦恼i设计的非农\r\n',21),('弱智瀑布流会梦见电子黄果树大瀑布吗？',22),('为什么没有设计能力还要自己写代码？直接偷别人的不香吗？\r\n我实属铁憨憨\r\nsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss',23),('我是一坨狗屎，很香的',28),('这实在是太酷了点吧',29),('泽哥永远滴神\r\n7哥永远滴神\r\n饶先生永远滴神\r\n姜先生永远滴神\r\n河南人永远滴神\r\n马先生永远滴神777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777',30),('如果早知道，别的组动动手指就能轻松爆杀我们组',31),('哇塞，这个文本框居然会自动伸长而且这些盒子会自己动起来，这到底是为什么做得这么稀饭？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？？',32),('好像今晚这个点，是DJ时刻吧，来点DJ啊',33),('完了，全完了\r\n没了，全没了\r\n废了，全废了\r\n只需简单三分钟，就能写出一万个改不好的BUG',34),('喂！晚上6点钟咧\r\n饮茶先啊！谁还做展示啊！？！？！？！？',35),('河南人军团大举入侵导致卷人狂流引发太平洋大风暴最终让龙卷风摧毁停车场',36),('测试用的文本还是得很酷很长所以我要奥斯丁佛i京东覅沃尔积分当年覅静安寺v发的手机佛啊你睡觉超i五饿啊隧道和念佛iv坏胡海峰你澳网iu恶臭分红爱妃坏u的方式妇女拉萨扩大解放和v能力阿里山可见度发v那里是看见对方阿灿率领的开发计划奥斯本可怜的家伙呢啊撒旦立刻返回你擦路上看到房价和那是带来非常艰苦纳入国家科委你的身份女孩都撒都会主席和v结案率可耐福索拉卡怎么v爱爱圣诞节佛我们完蛋了u凤凰男阿斯u的核心资产v',37),('写bug送网页\r\n可惜的是，真的有很多bug我不知道为什么会有所以我根本改不了',38),('777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777777',39),('呜呜呜别骂了别骂了，每当我看见别的组的网站做的那么酷炫我看着我做的这一坨稀饭眼泪就不住地流，怎么能有这么肮脏丑陋的网页在这里恶心人让人上吐下泻浑身无力四肢痉挛产生幻觉。我实在是受不了我自己了',40);
/*!40000 ALTER TABLE `thing` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-21 19:10:38
