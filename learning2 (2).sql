-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2020 at 03:05 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Tuấn', 'admin', 'admin1@gmail.com', NULL, '$2y$10$.qMhWRpUwsM2p0vUZrlBgeAWCwB7/ztQSQgfkMzX6cNy.kWVmCRg.', NULL, '2020-08-17 20:09:04', '2020-08-17 20:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Front-End', NULL, NULL, 'front-end'),
(2, 'Back-End', NULL, NULL, 'back-end'),
(3, 'Android', NULL, NULL, 'android'),
(4, 'IOS bbsbsb', NULL, '2020-08-13 06:29:51', 'ios'),
(6, 'Toán học', '2020-08-14 11:18:35', '2020-08-14 11:18:35', 'toan-hoc'),
(7, 'DevOps', '2020-08-19 10:03:27', '2020-08-19 10:03:27', 'devops');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `thumbnail`, `category_id`, `description`, `price`, `created_at`, `updated_at`, `slug`, `status_id`) VALUES
(1, 'Lập trình PHP', 'upload/course/14287acc-b5cb-46db-b8b4-e3ffe652fc0d.png', 2, 'PHP - viết tắt hồi quy của \"Hypertext Preprocessor\", là một ngôn ngữ lập trình kịch bản được chạy ở phía server nhằm sinh ra mã html trên client. PHP đã trải qua rất nhiều phiên bản và được tối ưu hóa cho các ứng dụng web, với cách viết mã rõ rãng, tốc độ nhanh, dễ học nên PHP đã trở thành một ngôn ngữ lập trình web rất phổ biến và được ưa chuộng.', NULL, '2020-07-14 01:57:25', '2020-08-27 08:08:30', 'lap-trinh-php', 1),
(2, 'Java swing', 'upload/course/amstrong.PNG', 3, 'Học về java nè3', NULL, '2020-08-12 17:48:42', '2020-08-12 18:48:06', 'java-swing', 1),
(3, 'Python', 'upload/course/php.PNG', 2, 'scscscsc', NULL, '2020-08-12 18:33:18', '2020-08-12 19:14:35', 'python', -1),
(4, 'Vue JS', 'upload/course/amstrong.PNG', 1, 'sdfsdfsđ', NULL, '2020-08-12 18:33:31', '2020-08-16 09:58:30', 'vue-js', 1),
(5, 'React JS', 'upload/course/1dbe2-1528032422-800.jpg', 1, 'ndndndn', NULL, '2020-08-12 18:33:38', '2020-08-16 09:58:36', 'react-js', 1),
(6, 'Angular JS', 'upload/course/angular-logo.jpg', 1, 'dfsdfs', NULL, '2020-08-12 18:33:53', '2020-08-23 03:03:27', 'angular-js', 1);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `work_place` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `name`, `username`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `status`, `avatar`, `about`, `work_place`) VALUES
(1, 'Sarah Parker', 'mentortest', 'mentortest@gmail.com', '$2y$10$5IqY0xjyikBc5FPXU7lzPOfJx5dvdecQgkx3bI9icp88Ib0WxW8Fi', NULL, NULL, '2020-08-20 18:54:07', '2020-08-20 19:51:24', '1', 'upload/instructors/avatar/instructor_2.jpg', 'sss', NULL),
(2, 'mentor02', 'mentor02', 'mentor02@gmail.com', '$2y$10$pT9bZf8xHt2GdXBTV5oVkOFTL25OUnBVsWwc0dkp0/YmuG0jWJWBy', NULL, NULL, '2020-08-20 19:50:02', '2020-08-20 19:52:14', NULL, 'upload/instructors/avatar/instructor_3.jpg', NULL, NULL),
(3, 'Admin Writer', 'mentor03', 'admintest@gmail.com', '$2y$10$fpMsNxnm12DMu0KUv3rwq.jNGoBjeJHONr/HWvPrNsOce22bJnpWu', NULL, NULL, '2020-08-28 23:06:04', '2020-08-28 23:22:50', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `status` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `name`, `video`, `course_id`, `status`, `created_at`, `updated_at`, `slug`, `description`) VALUES
(1, 'Viết chương trình hello world trong python', 'm66j0nKBMdc', 3, 1, '2020-08-15 07:20:03', '2020-08-16 17:54:39', 'viet-chuong-trinh-hello-world-trong-python', NULL),
(2, 'Viết chương trình hello world trong java', 'ok', 2, 1, '2020-08-15 07:22:14', '2020-08-16 17:55:18', 'viet-chuong-trinh-hello-world-trong-java', NULL),
(3, 'Biến trong python', 'nBBXR_imVKA', 3, 1, '2020-08-15 07:47:39', '2020-08-16 18:56:03', 'bien-trong-python', NULL),
(4, 'Viết chương trình hello world trong PHP', 'không có 12', 1, 1, '2020-08-16 07:03:23', '2020-08-24 07:51:18', 'viet-chuong-trinh-hello-world-trong-php', 'Bài mở đầu giới thiệu về Hello World'),
(5, 'Hello World Angular', 'Pd9QnYUwrAU', 6, 1, '2020-08-20 19:57:12', '2020-08-20 19:57:12', 'hello-world-angular', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2020_07_14_080528_create_table_courses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `writer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` int(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `content`, `thumbnail`, `category_id`, `writer_id`, `created_at`, `updated_at`, `is_active`, `slug`, `status`) VALUES
(1, 'JavaScript là gì? Giới thiệu cơ bản về JS cho người mới bắt đầu', 'JavaScript là ngôn ngữ lập trình phổ biến nhất trên thế giới trong suốt 20 năm qua. Nó cũng là một trong số 3 ngôn ngữ chính của lập trình web:', '<p>JavaScript có thể <a href=\"https://www.bitdegree.org/learn/javascript-basics/\"><strong>học nhanh</strong></a> và dễ dàng áp dụng cho nhiều mục đích khác nhau, từ việc cải thiện tính năng của website đến việc chạy game và tạo phần mềm nền web. Hơn nữa, có hàng ngàn mẫu template JavaScript và ứng dụng ngoài kia, nhờ vào sự cống hiến của cộng đồng, đặc biệt là Github.<br>&nbsp;</p><p>&nbsp;</p><p>Bạn đang cần tìm một nơi để tôi luyện kỹ năng JS? Hãy thuê một gói <a href=\"https://www.hostinger.vn/web-hosting-gia-re\"><strong>web hosting</strong></a> để có đủ thành phần cần thiết để biến giấc mơ coding của bạn thành sự thật!</p><p>&nbsp;</p><p>&nbsp;</p><h2><strong>JavaScript ngày đó và bây giờ</strong><br>&nbsp;</h2><p>JavaScript được tạo trong mười ngày bởi Brandan Eich, một nhân viên của Netscape, vào tháng 9 năm 1995. Được đặt tên đầu tiên là Mocha, tên của nó được đổi thành Mona rồi LiveScript trước khi thật sự trở thành JavaScript nổi tiếng như bây giờ. Phiên bản đầu tiên của ngôn ngữ này bị giới hạn độc quyền bởi Netscape và chỉ có các tính năng hạn chế, nhưng nó tiếp tục phát triển theo thời gian, nhờ một phần vào cộng đồng các lập trình viên đã liên tục làm việc với nó.</p><p>Trong năm 1996, JavaScript được chính thức đặt tên là ECMAScript. ECMAScript 2 phát hành năm 1998 và ECMAScript 3 tiếp tục ra mắt vào năm 1999. Nó liên tục phát triển thành JavaScript ngày nay, giờ đã hoạt động trên khắp mọi trình duyệt và trên khắp các thiết bị từ di động đến máy tính bàn.</p><p>JavaScript liên tục phát triển kể từ đó, có lục đạt đến 92% website đang sử dụng JavaScript vào năm 2016. Chỉ trong 20 năm, nó từ một ngôn ngữ lập trình riêng trở thành công cụ quan trọng nhất trên bộ công cụ của các chuyên viên lập trình web. Nếu bạn đang dùng internet, vậy chắc chắn bạn đã từng sử dụng JavaScript rồi.</p><h2><strong>Điều gì khiến JavaScript trở nên vĩ đại?</strong></h2><p>JavaScript có rất nhiều ưu điểm khiến nó vượt trội hơn so với các đối thủ, đặc biệt trong các trường hợp thực tế. Sau đây chỉ là một số lợi ích của JavaScript:</p><ol><li>Bạn không cần một compiler vì web browser có thể biên dịch nó bằng HTML;</li><li>Nó dễ học hơn các ngôn ngữ lập trình khác;</li><li>Lỗi dễ phát hiện hơn và vì vậy dễ sửa hơn;</li><li>Nó có thể được gắn trên một số element của trang web hoặc event của trang web như là thông qua click chuột hoặc di chuột tới;</li><li>JS hoạt động trên nhiều trình duyệt, nền tảng, vâng vâng;</li><li>Bạn có thể sử dụng JavaScript để kiểm tra input và giảm thiểu việc kiểm tra thủ công khi truy xuất qua database;</li><li>Nó giúp website tương tác tốt hơn với khách truy cập;</li><li>Nó nhanh hơn và nhẹ hơn các ngôn ngữ lập trình khác.</li></ol><h2><strong>Khuyết điểm của JavaScript là gì?</strong></h2><p>Mọi ngôn ngữ lập trình đều có các khuyết điểm. Một phần là vì ngôn ngữ đó khi phát triển đến một mức độ như JavaScript, nó cũng sẽ thu hút lượng lớn hacker, scammer, và những người có ác tâm luôn tìm kiếm những lỗ hổng và các lỗi bảo mật để lợi dụng nó. Một số khuyết điểm có thể kể đến là:</p><ol><li>Dễ bị khai thác;</li><li>Có thể được dùng để thực thi mã độc trên máy tính của người dùng;</li><li>Nhiều khi không được hỗ trợ trên mọi trình duyệt;</li><li>JS code snippets lớn;</li><li>Có thể bị triển khai khác nhau tùy từng thiết bị dẫn đến việc không đồng nhất.</li></ol><p>&nbsp;</p><p>Bạn có biết Hostinger đang có ưu đãi đặc biệt? Xem qua khuyến mãi để được giảm đến 82%!</p><p>Lưu ý là ưu đãi này có hạn thôi nhé!</p><p><a href=\"https://www.hostinger.vn/cart/add/hosting-hostinger-premium/order_period/3?coupon=START_BLOG\"><strong>Dùng Coupon</strong></a></p><p>&nbsp;</p><h2><strong>Cách hoạt động của JavaScript trên trang web là gì?</strong></h2><p>JavaScript thường được nhúng trực tiếp vào một <a href=\"https://www.hostinger.vn/huong-dan/lam-the-nao-de-tao-trang-web-tren-hostinger/\"><strong>trang web</strong></a> hoặc được tham chiếu qua file .js riêng. Nó là ngôn ngữ phía client, tức là script được tải về máy của khách truy cập và được xử lý tại đó thay vì phía server là xử lý trên server rồi mới đưa kết quả tới khách truy cập.</p><p>Hãy lưu ý là các trình duyệt web phổ biến cũng hỗ trợ việc người dùng có muốn tắt JavaScript hay không. Đó là lý do bạn nên biết trang web sẽ hoạt động như thế nào torng trường hợp không có JavaScript.</p><h2><strong>Điểm khác biệt giữa các ngôn ngữ lập trình khác và JavaScript là gì?</strong></h2><p>Lý do vì sao JavaScript là một trong các ngôn ngữ lập trình phổ biến nhất là nó rất linh hoạt. Trên thực tế, có nhiều lập trình viên chọn nó làm ngôn ngữ chính và chỉ sử dụng các ngôn ngữ khác trong danh sách bên dưới nếu nóhọ cần dùng điều gì đó đặc biệt.</p><p>Hãy xem qua các ngôn ngữ lập trình phổ biến nhất bên dưới:</p><figure class=\"table\"><table><tbody><tr><td><strong>JavaScript</strong></td><td>JavaScript hoặc JS sẽ giúp tăng tính tương tác trên website. Script này chạy trên các trình duyệt của người dùng thay vì trên server và thường sử dụng thư vuiên của bên thứ 3 nên có thể tăng thêm chức năng cho website mà không phải code từ đầu.</td></tr><tr><td><strong>HTML</strong></td><td>Viết tắt của “Hypertext Markup Language”, HTML là một trong số các ngôn ngữ lập trình phổ biến nhất trên web và xây dựng nên các khối chính của một trang web. Ví dụ về HTML tags là &lt;p&gt; cho đoạn văn và &lt;img&gt; cho hình ảnh.</td></tr><tr><td><strong>PHP</strong></td><td>PHP là ngôn ngữ phía server, khác với JavaScript chạy trên máy client. Nó thường được sử dụng trong các hệ quản trị nội dung nền PHP như WordPress, nhưng cũng thường được dùng với lập trình back-end và có thể tạo ra kênh truyền thông tin hiệu quả nhất tới và từ database.</td></tr><tr><td><strong>CSS</strong></td><td>CSS viết tắt của “Cascading Style Sheets” , nó giúp webmaster xác định styles và định nghĩa nhiều loại nội dung. Bạn có thể làm vậy thủ công với mọi yếu tố trong HTML, nhưng nếu vậy bạn sẽ cứ lặp đi lặp lại thành phần đó mà bạn dùng ở nhiều nơi khác nhau.</td></tr></tbody></table></figure><p>Nếu xem ngôn ngữ lập trình như là việc xây ngôi nhà, HTML sẽ định dạng kiến trúc của căn nhà, CSS sẽ là thảm và tường để trang trí ngôi nhà đẹp hơn. JavaScript thêm yếu tố tương tác trong ngôi nhà, như là việc mở cánh cửa và làm đèn sáng. Bạn vẫn có thể làm web mà không có JavaScript nhưng rủi ro là website của bạn trông như là những web thời những năm 1995.</p><h2><strong>Làm thế nào để thêm JavaScript trên website của bạn?</strong></h2><p>Để thêm chuỗi code JavaScript code vào trang web, bạn sẽ cần gắn tag &lt;script&gt;. Ví dụ như sau:</p><ol><li>&lt;script type=\"text/javascript\"&gt;</li><li>Your JavaScript code</li><li>&lt;/script&gt;</li></ol><p>Với quy tắc cơ bản, bạn nên gắn JavaScript trong tag &lt;header&gt; cho website của bạn trừ khi bạn muốn nó thực thi tại một thời điểm nhất định hoặc một yếu tố nhất định của trang web. Bạn cũng có thể lưu code JavaScript dưới file riêng và gọi nó lên mỗi khi cần trên website.</p><p>Để tìm hiểu thêm, hãy xem qua hướng dẫn làm thế nào để <a href=\"https://www.hostinger.vn/huong-dan/lam-the-nao-de-them-javascript-trong-html/\"><strong>thêm JavaScript vào trang web của bạn.</strong></a></p><h2><strong>Vậy, JavaScript là gì?</strong></h2><p>JavaScript là ngôn ngữ lập trình mang đến sự sinh động của website. Nó khác với HTML (thường chuyên cho nội dung) và CSS (thường chuyên dùng cho phong cách), và khác hẵn với PHP (chạy trên server chứ không chạy dưới máy client).</p><p>Bạn cần biết gì:</p><ol><li>JavaScript là ngôn ngữ dễ học;</li><li>Nó được phát triển bởi Netscape, và đang được dùng trên 92% webstie;</li><li>JS có thể được gắn vào một element của trang web hoặc sự kiện của trang web như cú click chuột;</li><li>Hoạt động trên đa trình duyệt và đa thiết bị;</li><li>Nhanh và nhẹ hơn các ngôn ngữ lập trình khác;</li><li>Có thể ít an toàn hơn vì độ phổ biến của nó;</li><li>Bạn có thể thêm JavaScript trực tiếp vào HTML hoặc bạn có thể lưu nó trên files riêng biệt và gọi lên khi cần.</li></ol><p>Cuối cùng, có một lý do vì sao JavaScript phổ biến đến vậy là: nó làm tốt những gì nó có thể làm. Vậy bạn không cần phải đắn đo nữa khi tìm hiểu về nó đâu! Chúng tôi hy vọng bài viết này đã giúp ích cho bạn và giúp bạn biết JavaScript là gì, cũng như cách thức hoạt động của nó.</p><p>Nếu bạn có bất kỳ câu hỏi nào hoặc muốn thảo luận gì, hãy để lại bình luận bên dưới cho chúng tôi biết nhé!</p>', 'upload/post/angular-logo.jpg', 1, 3, '2020-08-30 09:28:02', '2020-09-03 07:31:17', 1, 'javascript-la-gi-gioi-thieu-co-ban-ve-js-cho-nguoi-moi-bat-dau', '1'),
(2, 'CSS Framework có thật sự cần thiết như chúng ta nghĩ?', 'Đã có một thời gian khi ai đó hỏi “Bootstrap là gì?” Chúng ta đều sẽ trả lời rằng đó là “một điều kỳ diệu”. Thời điểm đó đã qua, giờ đây chúng ta đã quá hiểu và biết quá rõ những khả năng cũng như giới hạn của Bootstrap, cùng với việc sử dụng các CSS Framework trở nên thông dụng trong toàn ngành vì chúng tiết kiệm rất nhiều thời gian. Nhưng có một câu hỏi được đặt ra đó chính là “Liệu chúng ta có có thật sự cần CSS Framework?”. Bài viết này sẽ nếu ra những lý do bạn không cần CSS Framework.', '<h2>Chưa tận dụng hết CSS</h2><p>Có khoảng thời gian mà tất cả những gì chúng ta cần làm đó là thêm &nbsp;bootstrap.min.css và BOOM – phiên bản production của ứng dụng đã sẵn sàng… hoặc chúng ta nghĩ rằng nó đã sẵn sàng. Vì thật ra thì nó không đơn giản như vậy.</p><p><a href=\"https://topdev.vn/\">Những việc làm hấp dẫn</a></p><figure class=\"image\"><img src=\"https://salt.topdev.vn/69ktn90ydLgKHzqrHx0zF-7nKXcOKsCU3XlY_LK31QU/auto/120/0/ce/1/aHR0cHM6Ly9hc3Nl/dHMudG9wZGV2LnZu/L2ZpbGVzL2xvZ29z/L2Y5NTY5OWNmMmYy/OTQ1MTE3ZWFhMjUy/YzM1MmY3YjE1Lmpw/Zw.jpg\"></figure><p><a href=\"https://topdev.vn/partners/detail-jobs/senior-java-developer-code-engine-studio-2-2011932/?utm_source=topdev.vn&amp;utm_medium=jrec&amp;utm_term=Senior+Java+Developer&amp;token=RIBPOSVJgL+kR9V78tC1PePVkAR8STLmwYHXhY4o2z+8Jg6rR09xCNe2Zk2K/rcY1dv3kOtiRmtj5J4rtFRYiw==\"><strong>Senior Java Developer</strong></a></p><p>&nbsp;</p><p><a href=\"https://topdev.vn/partners/detail-jobs/senior-java-developer-code-engine-studio-2-2011932/?utm_source=topdev.vn&amp;utm_medium=jrec&amp;utm_term=Senior+Java+Developer&amp;token=RIBPOSVJgL+kR9V78tC1PePVkAR8STLmwYHXhY4o2z+8Jg6rR09xCNe2Zk2K/rcY1dv3kOtiRmtj5J4rtFRYiw==\"><strong>Code Engine Studio</strong><i>ĐNNegotiable</i></a></p><p><a href=\"https://topdev.vn/partners/detail-jobs/senior-java-developer-code-engine-studio-2-2011932/?utm_source=topdev.vn&amp;utm_medium=jrec&amp;utm_term=Senior+Java+Developer&amp;token=RIBPOSVJgL+kR9V78tC1PePVkAR8STLmwYHXhY4o2z+8Jg6rR09xCNe2Zk2K/rcY1dv3kOtiRmtj5J4rtFRYiw==\">JavaJavaScriptSpringStruts</a></p><figure class=\"image\"><img src=\"https://salt.topdev.vn/1zcGdRoVNqJUo4ngEUr8C92PpgtviETgBc-ifOyWgng/auto/120/0/ce/1/aHR0cHM6Ly9hc3Nl/dHMudG9wZGV2LnZu/L2ZpbGVzL2xvZ29z/LzIyMGUzZWFiZDll/MWJkYjNkOGMzZjAx/N2U5MWU3ZDUwLmpw/Zw.jpg\"></figure><p><a href=\"https://topdev.vn/partners/detail-jobs/senior-c-developer-rd-algorithm-aiml-cong-ty-tnhh-personify-viet-nam-2017515/?utm_source=topdev.vn&amp;utm_medium=jrec&amp;utm_term=Senior++C%2B%2B+Developer+%28R%26D%2C+Algorithm%2C+AI%2FML%29&amp;token=RIBPOSVJgL+kR9V78tC1PePVkAR8STLmwYHXhY4o2z+8Jg6rR09xCNe2Zk2K/rcY1dv3kOtiRmtj5J4rtFRYiw==\"><strong>Senior C++ Developer (R&amp;D, Algorithm, AI/ML)</strong></a></p><p>&nbsp;</p><p><a href=\"https://topdev.vn/partners/detail-jobs/senior-c-developer-rd-algorithm-aiml-cong-ty-tnhh-personify-viet-nam-2017515/?utm_source=topdev.vn&amp;utm_medium=jrec&amp;utm_term=Senior++C%2B%2B+Developer+%28R%26D%2C+Algorithm%2C+AI%2FML%29&amp;token=RIBPOSVJgL+kR9V78tC1PePVkAR8STLmwYHXhY4o2z+8Jg6rR09xCNe2Zk2K/rcY1dv3kOtiRmtj5J4rtFRYiw==\"><strong>CÔNG TY TNHH PERSONIFY VIỆT NAM</strong><i>HCMNegotiable</i></a></p><p><a href=\"https://topdev.vn/partners/detail-jobs/senior-c-developer-rd-algorithm-aiml-cong-ty-tnhh-personify-viet-nam-2017515/?utm_source=topdev.vn&amp;utm_medium=jrec&amp;utm_term=Senior++C%2B%2B+Developer+%28R%26D%2C+Algorithm%2C+AI%2FML%29&amp;token=RIBPOSVJgL+kR9V78tC1PePVkAR8STLmwYHXhY4o2z+8Jg6rR09xCNe2Zk2K/rcY1dv3kOtiRmtj5J4rtFRYiw==\">C++R&amp;DAlgorithmAI/ML</a></p><figure class=\"image\"><img src=\"https://salt.topdev.vn/qxnWa2Nv92GdI8RNxDOqwq0mNlyUMtwU9zgu47cJb1w/auto/120/0/ce/1/aHR0cHM6Ly9hc3Nl/dHMudG9wZGV2LnZu/L2ltYWdlcy8yMDIw/LzA3LzE2L2xvZ28t/VXllbkhhLXA1Y2tq/LnBuZw.jpg\"></figure><p><a href=\"https://topdev.vn/partners/detail-jobs/02-japanese-juniorsenior-front-end-developer-ritaworks-2-2012966/?utm_source=topdev.vn&amp;utm_medium=jrec&amp;utm_term=02+Japanese+Junior%2FSenior+Front-end+Developer&amp;token=RIBPOSVJgL+kR9V78tC1PePVkAR8STLmwYHXhY4o2z+8Jg6rR09xCNe2Zk2K/rcY1dv3kOtiRmtj5J4rtFRYiw==\"><strong>02 Japanese Junior/Senior Front-end Developer</strong></a></p><p>&nbsp;</p><p><a href=\"https://topdev.vn/partners/detail-jobs/02-japanese-juniorsenior-front-end-developer-ritaworks-2-2012966/?utm_source=topdev.vn&amp;utm_medium=jrec&amp;utm_term=02+Japanese+Junior%2FSenior+Front-end+Developer&amp;token=RIBPOSVJgL+kR9V78tC1PePVkAR8STLmwYHXhY4o2z+8Jg6rR09xCNe2Zk2K/rcY1dv3kOtiRmtj5J4rtFRYiw==\"><strong>Ritaworks</strong><i>HCM500 - 1,500 USD</i></a></p><p><a href=\"https://topdev.vn/partners/detail-jobs/02-japanese-juniorsenior-front-end-developer-ritaworks-2-2012966/?utm_source=topdev.vn&amp;utm_medium=jrec&amp;utm_term=02+Japanese+Junior%2FSenior+Front-end+Developer&amp;token=RIBPOSVJgL+kR9V78tC1PePVkAR8STLmwYHXhY4o2z+8Jg6rR09xCNe2Zk2K/rcY1dv3kOtiRmtj5J4rtFRYiw==\">CSSJavaScriptHTMLFront-End</a></p><figure class=\"image\"><img src=\"https://salt.topdev.vn/cGkCW-SS-ndZw5C_zg3EiJZaN1leujZ6aYMaPn4bYGs/auto/120/0/ce/1/aHR0cHM6Ly9hc3Nl/dHMudG9wZGV2LnZu/L2ltYWdlcy8yMDIw/LzA4LzI3L2xvZ28t/QW5uYVBoYW0teFdv/alkuanBn.jpg\"></figure><p><a href=\"https://topdev.vn/partners/detail-jobs/front-end-developer-kyberosc-2-2017544/?utm_source=topdev.vn&amp;utm_medium=jrec&amp;utm_term=FRONT-END+DEVELOPER&amp;token=RIBPOSVJgL+kR9V78tC1PePVkAR8STLmwYHXhY4o2z+8Jg6rR09xCNe2Zk2K/rcY1dv3kOtiRmtj5J4rtFRYiw==\"><strong>FRONT-END DEVELOPER</strong></a></p><p>&nbsp;</p><p><a href=\"https://topdev.vn/partners/detail-jobs/front-end-developer-kyberosc-2-2017544/?utm_source=topdev.vn&amp;utm_medium=jrec&amp;utm_term=FRONT-END+DEVELOPER&amp;token=RIBPOSVJgL+kR9V78tC1PePVkAR8STLmwYHXhY4o2z+8Jg6rR09xCNe2Zk2K/rcY1dv3kOtiRmtj5J4rtFRYiw==\"><strong>KyberOSC</strong><i>HN10,000,000 - 20,000,000 VND</i></a></p><p><a href=\"https://topdev.vn/partners/detail-jobs/front-end-developer-kyberosc-2-2017544/?utm_source=topdev.vn&amp;utm_medium=jrec&amp;utm_term=FRONT-END+DEVELOPER&amp;token=RIBPOSVJgL+kR9V78tC1PePVkAR8STLmwYHXhY4o2z+8Jg6rR09xCNe2Zk2K/rcY1dv3kOtiRmtj5J4rtFRYiw==\">CSSHTML5JavaScriptFront-End</a></p><figure class=\"image\"><img src=\"https://salt.topdev.vn/ERQIXiVXyCe_p19X5_u0Rs39LjK4qDNqCwjtCvhTXTc/auto/120/0/ce/1/aHR0cHM6Ly9hc3Nl/dHMudG9wZGV2LnZu/L2ltYWdlcy8yMDIw/LzA2LzAyL0hDRy1M/T0dPLTAxLXE1UG5O/LnBuZw.jpg\"></figure><p><a href=\"https://topdev.vn/partners/detail-jobs/machine-learning-engineer-hash-consulting-group-2-2017252/?utm_source=topdev.vn&amp;utm_medium=jrec&amp;utm_term=Machine+Learning+Engineer&amp;token=RIBPOSVJgL+kR9V78tC1PePVkAR8STLmwYHXhY4o2z+8Jg6rR09xCNe2Zk2K/rcY1dv3kOtiRmtj5J4rtFRYiw==\"><strong>Machine Learning Engineer</strong></a></p><p>&nbsp;</p><p><a href=\"https://topdev.vn/partners/detail-jobs/machine-learning-engineer-hash-consulting-group-2-2017252/?utm_source=topdev.vn&amp;utm_medium=jrec&amp;utm_term=Machine+Learning+Engineer&amp;token=RIBPOSVJgL+kR9V78tC1PePVkAR8STLmwYHXhY4o2z+8Jg6rR09xCNe2Zk2K/rcY1dv3kOtiRmtj5J4rtFRYiw==\"><strong>Hash Consulting Group</strong><i>HCMNegotiable</i></a></p><p><a href=\"https://topdev.vn/partners/detail-jobs/machine-learning-engineer-hash-consulting-group-2-2017252/?utm_source=topdev.vn&amp;utm_medium=jrec&amp;utm_term=Machine+Learning+Engineer&amp;token=RIBPOSVJgL+kR9V78tC1PePVkAR8STLmwYHXhY4o2z+8Jg6rR09xCNe2Zk2K/rcY1dv3kOtiRmtj5J4rtFRYiw==\">Machine LearningPythonAI</a></p><figure class=\"image\"><img src=\"https://res.cloudinary.com/practicaldev/image/fetch/s--BfHbj_85--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_66%2Cw_880/https://thepracticaldev.s3.amazonaws.com/i/pwy9dxbq9xpymdiw5d1m.gif\" alt=\"CSS Framework có thật sự cần thiết như chúng ta nghĩ?\"></figure><p>Cùng xem qua ví dụ từ trang web này nhé. Họ đang sử dụng Bootstrap cho landing page của mình. Có thể thấy nó đang được tối ưu hoá dung lượng nhưng điểm đặc biệt ở đây chính là có hơn <strong>90% CSS Framework</strong> không được sử dụng tới. Chỉ cần sử dụng công cụ <i>coverage</i> ở Chrome là bạn có thể kiểm tra bất kỳ trang web nào bằng cách bấm cmd + shift + p và gõ “coverage”.<br>Đương nhiên Bootstrap có các công cụ như <a href=\"https://getbootstrap.com/docs/3.4/customize/\">Customize and Download</a> cho phép bạn lựa chọn các thành phần và giảm kích thước của tệp đã tải xuống. Tuy nhiên vẫn còn rất nhiều code không thể sử dụng được. Bạn có thể xem buổi nói chuyện tuyệt vời của Addy Osmani về chủ đề này:</p><p>&nbsp;</p><h2>Small Projects với Big Projects</h2><p>Điều gì khiến cho Bootstrap trở nên phổ biến:</p><ul><li>Giúp cho các thiết kế thân thiện với điện thoại di động.</li><li>Giảm thời gian phát triển một dự án lớn.</li></ul><p>Vì vậy đừng lo lắng khi bạn đang làm việc trong một big project mà không có kỹ năng của lập trình viên Front-end, CSS Framework sẽ giúp bạn. Nhưng bạn có thực sự cần CSS Framework cho các project nhỏ? Tôi nghĩ là không đâu. Khi tôi tạo ra <a href=\"https://github.com/sarthology/Dev10\">Dev10</a>, tôi đã không sử dụng bất kỳ framework bên ngoài nào và cho thấy sự khác biệt.</p><figure class=\"image\"><img src=\"https://res.cloudinary.com/practicaldev/image/fetch/s--Xt10rx0Q--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_880/https://thepracticaldev.s3.amazonaws.com/i/ki6kolqit4aj3enify21.png\" alt=\"CSS Framework có thật sự cần thiết như chúng ta nghĩ?\"></figure><p>Điểm quan trọng ở đây chính là bạn phải đánh giá phạm vi của dự án một cách khôn ngoan. Nếu bạn không có quá nhiều thành phần và trang UI trong ứng dụng của mình thì bạn không cần đến framework.</p><p><strong>Tối Ưu Front-end Để Web Của Bạn Load Dưới 5 Giây</strong></p><p>&nbsp;</p><h2>Cách nào giúp thay thế các framework trong các project nhỏ?</h2><p>Việc sử dụng CSS vanila để tạo nên các thiết kế thân thiện với các thiết bị di động không chỉ khả thi, mà nó còn dễ hơn nhiều so với việc sử dụng các framework. Đây là hai thuộc tính CSS rất mạnh và hữu ích.</p><h3>1/ Flex</h3><p>Kiểm tra pen này. Chỉ cần sử dụng vào dòng code bạn đã có thể tạo ra các trang responsive tuyệt vời giống như thế.</p><figure class=\"image\"><img src=\"https://i.giphy.com/media/877GgxNwrEZRsJyv5T/giphy.gif\" alt=\"CSS Framework có thật sự cần thiết như chúng ta nghĩ?\"></figure><p>Vì thế hãy dành thời gian để tìm hiểu về nó. Đây là một số nguồn có thể giúp bạn:</p><ul><li><a href=\"https://css-tricks.com/snippets/css/a-guide-to-flexbox/\">A Complete Guide to Flexbox</a> – CSS tricks</li><li><a href=\"https://www.youtube.com/watch?v=JJSoEo8JSnc\">Flexbox CSS In 20 Minutes</a> – Traversy Media (Video)</li><li><a href=\"https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Flexible_Box_Layout/Basic_Concepts_of_Flexbox\">Basic concepts of flexbox</a> – MDN (All time favorite)</li></ul><h3>2/ Grid</h3><p>Điều bạn cần học hỏi chính là hãy mang phần CSS grid đơn giản từ các framework mà bạn hay dùng và để vào các steroid. Nếu bạn là một người từng chỉ sử dụng Bootstrap từ grid system, hãy sử dụng grid &nbsp;và tạo ra bố cục tùy chỉnh của chính mình.</p><ul><li><a href=\"https://css-tricks.com/snippets/css/complete-guide-grid\">A Complete Guide to Grid</a> – CSS tricks</li><li><a href=\"https://www.youtube.com/watch?v=jV8B24rSN5o\">CSS Grid Layout Crash Course</a> – Traversy Media (Video)</li><li><a href=\"https://developer.mozilla.org/en-US/docs/Web/CSS/CSS_Grid_Layout/Basic_Concepts_of_Grid_Layout\">Basic Concepts of grid layout</a> – MDN</li></ul><h3>3/ Sử dung các đoạn code cho các UI component</h3><p>Bạn chỉ cần truy cập Codepen nếu như đang băn khoăn và cần thêm cảm hứng cho các yếu tố UI giống như các button và navbar. Đây là một cộng đồng tuyệt vời giúp bạn có thể tìm thấy hằng trăm pen để trợ giúp bạn. Đây là một số nguồn vô cùng hữu ích:</p><ul><li><a href=\"https://github.com/you-dont-need/You-Dont-Need-Javascript\">You-Dont-Need-JavaScript</a> – Kind of a replacement for bootstrap.js</li><li><a href=\"https://www.awwwards.com/best-css-code-snippets-sites.html\">Best CSS Code Snippet Sites</a></li></ul><p>Nếu vẫn cảm thấy khó khăn trong việc tìm CSS cho một số thành phần UI hãy sử dụng các thành phần Inspect cũ của mình.</p><h3>4/ Sử dụng đoạn code Animation</h3><p>Thông tin thú vị: Tôi đã ngừng viết bài này vào ngày 21/01 vì bài viết này đã mang đến cho tôi những ý tưởng và cảm hứng để làm việc trên Animatopy. Nếu bạn vẫn còn nhớ công cụ tuyệt vời <a href=\"https://daneden.github.io/animate.css/\">animate.css</a> nhưng mặt hạn chế duy nhất của nó là khi muốn sử dụng một vài hình ảnh động bạn vẫn phải bao gồm CSS hoàn chỉnh.</p><p>Điều này hoàn toàn không cần thiết và khiến tôi khó chịu, vì thế tôi đã tạo nên <a href=\"https://sarthology.github.io/Animatopy/\">Animatopy</a>. Bạn chỉ cần sao chép đoạn code mà không cần thiết phải download Animate.css.</p><figure class=\"image\"><img src=\"https://res.cloudinary.com/practicaldev/image/fetch/s--yST4Un12--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_66%2Cw_880/https://thepracticaldev.s3.amazonaws.com/i/59gwcnxitzh77zzv3h2r.gif\" alt=\"CSS Framework có thật sự cần thiết như chúng ta nghĩ?\"></figure><h3>Kết luận/ Tl; dr</h3><p>Đây chính là “quy tắc vàng” nếu đó là một project nhỏ hãy giữ nó và đừng sử dụng các framework. Các tệp với kích thước lớn duy nhất là hình ảnh và bạn cần tối ưu hóa nó chứ không phải CSS</p><h2>Vậy còn các Big Project thì sao?</h2><p>Điều này sẽ vô cùng dễ dàng nếu bạn chỉ mới bắt đầu với một project mới. Nhưng nếu project lớn của bạn có sẵn và đang chạy, quá trình chuyển đổi này chỉ thành công khi nó được lên kế hoạch một cách hoàn hảo và thảo luận kỹ với các thành viên trong team của mình. Dưới đây là một vài mẹo để tối ưu hóa các project lớn.</p><h3>1/ Loại bỏ CSS không sử dụng khỏi dự án</h3><p>Nhờ vào cộng đồng Javascript tuyệt vời mà chúng ta có các công cụ vô cùng hữu ích để tối ưu hóa CSS. Purifycss là một công cụ tuyệt vời mà bạn có thể sử dụng cho project lớn của mình. Nó có sẵn trong:</p><ul><li><a href=\"https://github.com/purifycss/grunt-purifycss\">Grunt</a></li><li><a href=\"https://github.com/purifycss/gulp-purifycss\">Gulp</a></li><li><a href=\"https://github.com/purifycss/purifycss-webpack-plugin\">Webpack</a></li></ul><h3>2/ Sử dụng tất cả Minify/Uglify</h3><p>Có vô số cách để giảm thiểu kích thước CSS, một cách rõ ràng nhất đó là minify chúng. Đã có rất nhiều bài viết nói về điều này nhưng bài viết dưới đây là một bài tuyệt vời để tiết kiệm thời gian của bạn</p><ul><li><a href=\"https://medium.com/making-internets/better-css-with-javascript-88463deecf3\">Better CSS with JavaScript</a></li></ul><h3>3/ Tạo CSS wiki hay &nbsp;Documentation (nếu bỏ các framework)</h3><p>Nếu bạn đã quyết tâm “chia tay” các framework hoàn toàn thì hãy tận dụng những điều tốt nhất từ framework, các documentation được viết tốt. Bằng cách này, lập trình viên có thể dễ dàng sao chép và dán các đoạn code để tiết kiệm thời gian. Đây chính là cách giúp bạn và đồng đội của mình tiết kiệm được thời gian và tránh được các lỗi từ các lập trình viên khác. Tất nhiên nơi tốt nhất để bắt đầu là các documentation từ các framework này.</p><h2>Kết luận:</h2><p>Việc sử dụng các framework hay không hoàn toàn phụ thuộc vào quyết định của bạn. Yếu tố quan trọng nhất chính là tận dụng tối đa những gì tốt nhất của chúng một cách thiết thực và kiểm tra các thuộc tính mới để thay thế các thuộc tính cũ.</p><p>Bài viết này chỉ mang tính chất chủ quan để giúp bạn suy nghĩ nhiều hơn về vấn đề này. Đừng ngại chia sẻ những bí quyết cũng như các mẹo hay đề nghị của bạn ở phía bên dưới nhé!</p>', 'upload/post/ki6kolqit4aj3enify21.png', 1, 4, '2020-09-03 07:36:10', '2020-09-03 09:21:33', 1, 'css-framework-co-that-su-can-thiet-nhu-chung-ta-nghi', '1'),
(3, '10 kỹ năng quan trọng để tìm công việc lập trình viên frontend dễ dàng hơn', 'Dù đang là sinh viên hay đã làm việc trong ngành công nghệ thông tin về mảng lập trình web thì những gì mình sắp giới thiệu dưới đây đều là những kỹ năng thiết thực và quan trọng để bạn trở thành 1 lập trình viên frontend tốt hơn cũng như giúp bạn tìm 1 công việc phù hợp ưng ý được dễ dàng khi hầu hết các công ty đều yêu cầu các kĩ năng này khi tuyển dụng.', '<h2>Lập trình viên frontend là gì? 🌟</h2><p>Trong các bài viết trước, mình đã giới thiệu đến các bạn <a href=\"https://topdev.vn/blog/7-huong-di-dang-gia-cho-moi-lap-trinh-vien-web-trong-nam-2020/\">7 hướng đi của 1 lập trình viên web</a> cũng như <a href=\"https://topdev.vn/blog/lo-trinh-cho-moi-nha-phat-trien-web-trong-nam-2020/\">lộ trình trong sự nghiệp lập trình viên web</a> cho những ai còn đang phân vân chưa biết mình nên trở thành 1 <i>frontend</i>, <i>backend</i> hay <i>devops</i> thì hôm nay mình chỉ tập trung nói về lập trình viên frontend. Chúng ta bắt đầu thôi:<br><br>Để bạn có cái nhìn rõ hơn mình xin giới thiệu sơ về mảng lập trình web 1 chút, cơ bản gồm 2 phần chính, với yêu cầu những kỹ năng, kiến thức công nghệ khác nhau: <i>frontend</i> sẽ là thứ người dùng tương tác trực tiếp (user interface – giao diện người dùng) và <i>backend</i> là những gì đằng sau nó và làm cho 1 website hoạt động. Tóm lại, frontend sẽ chăm sóc ‘client-side’, còn backend chính là ‘server-side’.<br><br>Nếu ví von 1 trang web như cơ thể người thì HTML sẽ là khung xương, phần cơ bản nhất. Để cơ thể vận động được cần có cơ và gân, hay để 1 dynamic web chạy cần có JavaScript và các ngôn ngữ lập trình khác. Cuối cùng để xem cơ thể đó xấu hay đẹp cần da thịt đắp lên hay nói cách khác muốn 1 website đẹp đẽ thì sẽ cần tới CSS để <i>trang trí</i> trang web đó được bắt mắt.&nbsp;</p><p>Điều này cần được phân biệt rõ để bạn có thể xác định những kỹ năng cần thiết cho 1 lập trình viên frontend.&nbsp;</p><h3>10 kỹ năng phải có cho công việc lập trình viên frontend 🌟</h3><h4>HTML / CSS ⚡️</h4><figure class=\"image\"><img src=\"https://topdev.vn/blog/wp-content/uploads/2020/08/1.jpg\" alt=\"10 kỹ năng phải có cho công việc lập trình viên\" srcset=\"https://topdev.vn/blog/wp-content/uploads/2020/08/1.jpg 176w, https://topdev.vn/blog/wp-content/uploads/2020/08/1-150x150.jpg 150w\" sizes=\"100vw\" width=\"176\"></figure><p>Thành thục HTML5, CSS3 là bắt buộc phải có. Mình biết chắc trong lúc tìm hiểu bạn đã thấy 2 cái tên này xuất hiện khắp nơi. Bạn sẽ không thể tìm được công việc lập trình frontend nào mà không yêu cầu việc sử dụng hiệu quả 2 ngôn ngữ này. Giờ hãy kể sơ qua về nó 1 chút nhé:</p><p>– HTML hay HyperText Markup Language là ngôn ngữ đánh dấu tiêu chuẩn được dùng để tạo các trang web. Ngôn ngữ đánh dấu là cách bạn ghi chú trong tài liệu kỹ thuật số để có thể được phân biệt với văn bản thông thường. Đây là phần cơ bản nhất bạn cần để phát triển 1 trang web.<br><br>– CSS hay Cascading Style Sheets là ngôn ngữ định kiểu theo tầng được dùng để giới thiệu phần tài liệu bạn đã tạo với HTML. HTML đến trước tiên để tạo nền tảng cho trang web, CSS tiếp đó được dùng để tạo layout, màu sắc, font chữ và style cho trang web của bạn.<br><br>Cả 2 ngôn ngữ này rõ ràng rất thiết thực để bạn trở thành 1 lập trình viên frontend. Nói gọn hơn nữa rằng nếu <i>không có HTML/CSS</i> thì sẽ <i>không có lập trình web.</i><br><br><strong>Mẹo nhỏ xíu 🔥:</strong> Bạn nên comment trong code của mình từ khi viết HTML, tuy dài và công phu hơn nhưng mọi chuyện sau cùng sẽ dễ dàng hơn.</p><h4>JavaScript / jQuery / DOM ⚡️</h4><figure class=\"image\"><img src=\"https://topdev.vn/blog/wp-content/uploads/2020/08/2.jpg\" alt=\"topdev\" srcset=\"https://topdev.vn/blog/wp-content/uploads/2020/08/2.jpg 168w, https://topdev.vn/blog/wp-content/uploads/2020/08/2-150x150.jpg 150w\" sizes=\"100vw\" width=\"168\"></figure><p>1 công cụ quan trọng khác trong bộ đồ nghề frontend của bạn chính là JavaScript (JS). Trong khi HTML là ngôn ngữ đánh dấu và CSS là ngôn ngữ định kiểu, thì JS mới chính là ngôn ngữ lập trình thực thụ. Điểm khác nhau là gì? Nếu HTML và CSS quyết định phần trình bày của 1 trang web, thì JS sẽ quyết định phần chức năng.<br>&nbsp;</p><p>Trong vài trường hợp nhất định, 1 trang web siêu đơn giản có thể sẽ không cần tới, nhưng trong trường hợp bạn cần các tính năng tương tác như âm thanh, video, trò chơi, khả năng cuộn, hoạt ảnh trên trang thì JS chính là công cụ bạn sẽ dùng để triển khai chúng. (Hiện tại CSS cũng đã được phát triển để có khả năng xử lý 1 vài tác vụ này rồi.)<br><br>Bạn không cần phải vội vàng trong việc sớm thành thạo jQuery hay những framework khác, vì không hề đơn giản. Hãy thử những gì cơ bản nhất như tìm hiểu kỹ DOM, 1 phần không thể thiếu trong việc lập trình web, mình xin giới thiệu 1 chút về các thành phần DOM:<br>&nbsp;</p><ul><li>DOM document: lưu trữ toàn bộ thành phần trong tài liệu của trang web.</li><li>DOM element: truy xuất đến 1 thẻ HTML thông qua các thuộc tính như id, tên class, tên thẻ HTML.</li><li>DOM HTML: thay đổi giá trị nội dung và thuộc tính các thẻ HTML</li><li>DOM CSS: thay đổi định dạng CSS của thẻ <a href=\"https://topdev.vn/blog/?s=html\">HTML</a></li><li>DOM Event: gán các sự kiện như onclick(), onload() vào thẻ HTML</li><li>DOM Listener: lắng nghe các sự kiên tác động lên 1 thẻ HTML</li><li>DOM Navigation: quản lý, thao tác với thẻ HTML, thể hiện mối quan hệ cha và con của các thẻ <a href=\"https://topdev.vn/blog/?s=html\">HTML</a></li><li>DOM Node, Nodelist: thao tác với HTML thông qua object.</li></ul><p>1 điểm nổi trội để giúp JS trở nên cần thiết là nhờ vào sự tồn tại của các thư viện như jQuery, 1 bộ sưu tập các plugin và extension làm nó nhanh và dễ sử dụng JS hơn trên web của bạn. jQuery sẽ nhận các tác vụ thông thường vốn yêu cầu nhiều dòng code JS và nén chúng vào 1 format mà có thể thực thi được chỉ trong 1 dòng code duy nhất. Đây là sẽ lợi thế lớn khi bạn dùng JS, trừ khi… bạn không thích tiết kiệm thời gian (mình đùa thôi).</p><p><a href=\"https://topdev.vn/blog/bi-kip-hoc-front-end-cua-grab-phan-1/\"><strong>&nbsp; Bí kíp học Front-end của Grab (Phần 1)</strong></a></p><p><a href=\"https://topdev.vn/blog/bi-kiep-hoc-front-end-cua-grab-phan-2/\"><strong>&nbsp; Bí kiếp học Front-end của Grab (Phần 2)</strong></a></p><h4>CSS và các framework của JavaScript ⚡️</h4><figure class=\"image\"><img src=\"https://topdev.vn/blog/wp-content/uploads/2020/08/3.jpg\" alt=\"tuyển dụng it\" srcset=\"https://topdev.vn/blog/wp-content/uploads/2020/08/3.jpg 168w, https://topdev.vn/blog/wp-content/uploads/2020/08/3-150x150.jpg 150w\" sizes=\"100vw\" width=\"168\"></figure><p>CSS và các framework JavaScript là các bộ sưu tập của các file CSS hay JS mà sẽ làm khá nhiều việc cho bạn bằng việc cung cấp chứng năng thường gặp (như đăng nhập vào 1 trang web hay tìm kiếm blog). Thay vì bắt đầu bằng 1 tài liệu văn bản trống thì bạn bắt đầu bằng 1 file code mà đã có sẵn khá nhiều JS tuyệt vời trong nó rồi.</p><p>Các framework thật ra cũng có điểm mạnh và điểm yếu của nó, và thực sự quan trọng để chọn framework tốt nhất cho loại website bạn muốn dựng. Ví dụ: vài framework JS khá tuyệt&nbsp; cho việc dựng phần giao diện người dùng phức tạp, trong khi những cái khác lại xuất sắc trong việc hiển thị tất cả nội dung trang web của bạn.</p><p>Tuyệt hơn nữa là bạn có thể dùng nhiều framework cùng nhau. Việc xài cặp Bootstrap với framework JS khác như AngularJS là chuyện bình thường. Phần nội dung sẽ được chăm sóc bởi Angular và phần giao diện với Bootstrap (và 1 ít CSS trong đó nữa).</p><p>Vì bạn sẽ dùng CSS và JS suốt trong sự nghiệp lập trình web của mình, cũng như nhiều dự án sẽ bắt đầu với các yếu tố style và code tương tự, nên có kiến thức thâm sâu về những framework này sẽ cực kì hữu ích cho bạn trong việc trở thành 1 lập trình viên web có năng lực được các công ty chào đón.</p><blockquote><p><i>Ngoài ra, mình cũng xin giới thiệu sơ về 1 framework nổi tiếng về responsive mà mình đã nhắc tới ở trên là Bootstrap. Phải công nhận là mọi thứ điều trở nên thuận tiện và dễ dàng hơn cùng Bootstrap, và gần như trở thành 1 thứ không thể thiếu khi làm responsive nên việc thành thục nó là điều rất tuyệt.</i></p></blockquote><p>Xem tiếp...</p><p>Tuy nhiên, nó khá nặng và trong vài trường hợp đặc biệt không sử dụng được bạn sẽ phải tự viết CSS, nên hãy làm chủ kỹ năng CSS của mình ngay từ đầu. Theo mình cách tốt nhất là nên sử dụng nó 1 cách hợp lý và đúng lúc.<br>&nbsp;</p><h4>Tiền xử lý CSS – CSS Preprocessing ⚡️</h4><figure class=\"image\"><img src=\"https://topdev.vn/blog/wp-content/uploads/2020/08/4.jpg\" alt=\"frontend\" srcset=\"https://topdev.vn/blog/wp-content/uploads/2020/08/4.jpg 161w, https://topdev.vn/blog/wp-content/uploads/2020/08/4-150x150.jpg 150w\" sizes=\"100vw\" width=\"161\"></figure><p><i>CSS Preprocessing</i></p><p>Thêm 1 kỹ năng cần thiết khác có liên quan tới CSS! CSS bản thân nó đã luôn cần thiết, nhưng cũng có đôi lúc bị giới hạn. 1 trong những giới hạn rõ nhất là bạn không thể xác định biến, chức năng hay thực thi các phép tính toán học.</p><p>Vốn là 1 vấn đề đáng ngại khi 1 dự án dần tăng trong khoản scale và code base, và bạn sẽ thấy mình tốn quá nhiều thời gian cho việc viết những code lặp đi lặp lại chỉ để thực hiện các thay đổi. Như các framework CSS (và JS), Tiền xử lý CSS cũng là 1 cách để làm cho công việc lập trình web của bạn được dễ dàng và linh hoạt hơn.<br>&nbsp;</p><p>Sử dụng các bộ tiền xử lý CSS – CSS preprocessor như <a href=\"http://sass-lang.com/\">Sass</a>, <a href=\"http://lesscss.org/\">LESS</a> hay <a href=\"http://stylus-lang.com/\">Stylus</a>, bạn sẽ có khả năng viết code bằng ngôn ngữ của bộ tiền xử lý (cho phép bạn được nhiều thứ vốn khá khó chịu với CSS cũ). Bộ tiền xử lý rồi sẽ chuyển đổi code đó tới CSS để nó hoạt động được trên web của bạn.</p><p>Giả sử bạn quyết định điều chỉnh sắc độ màu xanh lam đang dùng trên web. Với bộ tiền xử lý CSS, bạn chỉ phải thay đổi giá trị hex ở 1 chỗ thay vì phải chuyển tất cả phần CSS của mình và thay đổi giá trị hex mọi nơi.</p><p><a href=\"https://topdev.vn/blog/?p=19576\"><strong>&nbsp; Cấu hình Mock API đối với Front-End (React) Project</strong></a></p><p><a href=\"https://topdev.vn/blog/?p=19490\"><strong>&nbsp; Cùng tìm hiểu về Ant Design, một thư viện đắc lực của Front-End</strong></a></p><h4>Hệ thống quản lý phiên bản – Version Control / Git ⚡️</h4><figure class=\"image\"><img src=\"https://topdev.vn/blog/wp-content/uploads/2020/08/5.jpg\" alt=\"frontend\"></figure><p><i>Version Control / Git</i></p><p>1 trong những kỹ năng cũng quan trọng không kém và tuy không có cái tên HTML, CSS hay JS nào trong đó nhưng vẫn đủ vì sự liên quan mật thiết!</p><p>Sau tất cả nỗ lực với việc marking-up bằng HTML, styling với CSS và lập trình với JS, bạn sẽ trải qua vô số lần sửa đổi khi phát triển.</p><p>Nếu có gì đó trục trặc xảy ra trong suốt chặn đường, điều cuối cùng bạn sẽ muốn làm là bắt đầu lại từ đầu. Version control là quá trình truy lùng và điều chỉnh những thay đổi tới source code của bạn để điều tệ hại đó không xảy ra.</p><p>Phần mềm version control, như Git – 1 nguồn mở cực ổn định, chính là công cụ bạn sẽ dùng để truy ra những thay đổi để bạn có thể trở về 1 phiên bản trước đó và tìm ra những gì sai sót mà không cần phải làm rối tung hết mọi thứ.</p><p>Và đây là 1 kỹ năng thú vị mà bạn (và cả khách hàng hay sếp của bạn nữa) sẽ rất hài lòng với nó.</p><h4>Thiết kế responsive ⚡️</h4><figure class=\"image\"><img src=\"https://topdev.vn/blog/wp-content/uploads/2020/08/6.jpg\" alt=\"frontend\" srcset=\"https://topdev.vn/blog/wp-content/uploads/2020/08/6.jpg 168w, https://topdev.vn/blog/wp-content/uploads/2020/08/6-150x150.jpg 150w\" sizes=\"100vw\" width=\"168\"></figure><p><i>Thiết kế responsive</i></p><p>Nhớ lại ngày xưa cách duy nhất để bạn có thể lướt những trang web là sử dụng các máy tính để bàn. Ngày nay chúng ta có vô số thiết bị như máy vi tính, điện thoại, máy tính bảng để làm việc đó. Những trang web đó dù bạn có xài thiết bị gì đi nữa, chúng cũng đều làm tốt công việc hiển thị của mình dù bạn không cần phải làm gì cả.</p><p>Đó là nhờ vào phần thiết kế responsive. Hiểu rõ các nguyên tắc thiết kế responsive và cách triển khai chúng ở phần coding của mình chính là mấu chốt cho lập trình frontend.</p><p>1 thứ thú vị cần ghi nhớ về thiết kế responsive nữa là nó cũng là 1 phần nội tại trong các framework CSS như Bootstrap mà mình đã kể ở trên. Tất cả những kỹ năng này đều được kết nối với nhau, nên khi học 1 kỹ năng này, bạn cũng sẽ bổ trợ cho những kỹ năng khác cùng 1 lúc.</p><h4>Testing / Debugging ⚡️</h4><figure class=\"image\"><img src=\"https://topdev.vn/blog/wp-content/uploads/2020/08/7.jpg\" alt=\"frontend\" srcset=\"https://topdev.vn/blog/wp-content/uploads/2020/08/7.jpg 156w, https://topdev.vn/blog/wp-content/uploads/2020/08/7-150x150.jpg 150w\" sizes=\"100vw\" width=\"156\"></figure><p><i>Testing / Debugging</i></p><p>Từ 1 trang web kinh doanh nhỏ lẻ cho tới 1 trang quốc tế cho ngân hàng trực tuyến, bug là thứ dù rất đáng ghét nhưng sẽ luôn song hành với bạn trong sự nghiệp lập trình (trừ khi là bạn không code nữa…).</p><p>Và để giữ mọi thứ tiếp tục phát triển, bạn cần phải test code của mình để tìm bug suốt chặng đường, nên khả năng test và debug cũng nằm trong danh sách những kỹ năng không thể thiếu cho các dev frontend.</p><p>Có khá nhiều phương pháp test cho lập trình web. Test chức năng – functional testing sẽ trông hộ 1 phần chức năng cụ thể trên web của bạn (như 1 form hay database) và đảm bảo rằng nó thực hiện đúng mọi chức năng mà bạn đã code.</p><p>Test đơn vị – unit test cũng là 1 phương pháp. Nó test từng bit nhỏ nhất của code mà chịu trách nhiệm cho 1 thứ gì đó trên web của bạn và xem từng cá thể đó có hoạt động chính xác hay không.</p><p>Test là 1 phần lớn cho quá trình phát triển frontend, may thay, đã có sẵn những framework để giúp bạn làm điều này. Những chương trình như Mocha và Jasmine được thiết kế để giúp bạn tăng tốc và đơn giản hóa quá trình testing của bạn. (trừ khi bạn muốn làm quen với em tester nào đó ở chỗ làm).</p><h4>Các công cụ phát triển trình duyệt ⚡️</h4><figure class=\"image\"><img src=\"https://topdev.vn/blog/wp-content/uploads/2020/08/8.jpg\" alt=\"frontend\" srcset=\"https://topdev.vn/blog/wp-content/uploads/2020/08/8.jpg 174w, https://topdev.vn/blog/wp-content/uploads/2020/08/8-150x150.jpg 150w\" sizes=\"100vw\" width=\"174\"></figure><p><i>Các công cụ phát triển trình duyệt</i></p><p>Dù thế nào đi nữa, những người dùng cuối cùng sẽ tương tác với web của bạn thông qua 1 trình duyệt web. Cách web của bạn được hiển thị bởi các trình duyệt này sẽ là phần quan trọng quyết định thành quả của bạn có thành công hay không.</p><p>Tương tự như testing hay debugging mình đã đề cập ở trên, tất cả trình duyệt web hiện đại đều đi kèm với developer tools – các công cụ phát triển trình duyệt. Nó cho phép bạn test và tinh chỉnh các trang trong chính trình duyệt đó, theo nhiều cách cụ thể để thể hiện cách trình duyệt diễn giải code của bạn.</p><p>Các chi tiết cụ thể sẽ khác nhau giữa các trình duyệt, nhưng không sao, thường các developer tools bao gồm trình kiểm tra và bảng điều khiển JavaScript.</p><blockquote><p><i>Inspector – trình kiểm tra cho phép bạn thấy runtime HTML trên trang của bạn trông ra sao, CSS nào được liên kết với từng yếu tố trên trang, còn cho phép bạn edit phần HTML/ CSS và xem những thay đổi trực tiếp khi thực hiện. Bảng điều khiển JS còn cho phép bạn xem bất kỳ lỗi nào xảy ra khi trình duyệt cố gắng thực thi mã JS của bạn.</i></p></blockquote><p>Xem tiếp...</p><p><strong>Mẹo nhỏ xíu 🔥:</strong> Hãy tìm hiểu sự khác nhau giữa các trình duyệt phổ biến (như Chrome, Firefox, Safari, Opera, Cốc Cốc hay gần đây nhất là Edge…). Điều thú vị là mỗi trình duyệt trên các nền tảng khá nhau sẽ hiển thị phần CSS khác đi 1 chút.</p><p>Ví dụ như dù sử dụng chung nền tảng -webkit- nhưng CSS của Chrome, Safari và Edge sẽ không giống hệt nhau đâu. Tốt nhất là hãy thử code của mình trên các trình duyệt khác nhau vì người dùng có vô số sự lựa chọn hay sở thích để sử dụng.</p><p><a href=\"https://topdev.vn/blog/tuong-lai-cua-javascript-ra-sao-trong-the-gioi-front-end/\"><strong>&nbsp; Tương lai của JavaScript ra sao trong thế giới Front-End?</strong></a></p><p><a href=\"https://topdev.vn/blog/hoc-front-end/\"><strong>&nbsp; Nguồn tự học web front-end và web configuration ngon bổ rẻ</strong></a></p><h4>Dựng web và công cụ tự động/hiệu năng web ⚡️</h4><figure class=\"image\"><img src=\"https://topdev.vn/blog/wp-content/uploads/2020/08/9.jpg\" alt=\"frontend\" srcset=\"https://topdev.vn/blog/wp-content/uploads/2020/08/9.jpg 160w, https://topdev.vn/blog/wp-content/uploads/2020/08/9-150x150.jpg 150w\" sizes=\"100vw\" width=\"160\"></figure><p><i>Dựng web và công cụ tự động / hiệu năng web</i></p><p>Chắc bạn cũng biết bộ ba HTML/ CSS và JS là những công cụ chính để phát triển frontend. Trong khi hầu hết các kỹ năng khác đều giúp cho các công cụ đó hiệu quả hơn hay giúp test trang của bạn và sửa lỗi. Chúng ta sẽ tiếp tục với chúng trong phần này với việc dựng web, công cụ tự động và hiệu năng web.</p><p>Bạn có thể code ra những trang web xịn sò nhất nhưng nếu nó chạy 1 cách rùa bò trên thiết bị của người dùng thì mọi chuyện lại thành công cốc. Hiệu năng web là về việc mất bao lâu để trang web của bạn có thể load được. Nếu bạn có vấn đề với điều này thì mình có sẽ chỉ cho bạn vài cách để cải thiện chúng:</p><p>Tối ưu hóa hình ảnh: scaling và nén các hình ảnh cho hiệu năng web cao nhất.</p><p>Thu gọn CSS và JavaScript: gỡ bỏ tất cả những ký tự không cần thiết mà không làm thay đổi các chức năng.</p><p>Thực hiện các tác vụ này để tăng hiệu năng web có thể hơi tốn thời gian, nhưng đây cũng là lý do công cụ tự động tồn tại. Những chương trình như Grunt và gulp có thể được dùng để tự động tối ưu hóa hình ảnh, thu gọn CSS và JS, và các công việc khác về hiệu năng web. Để trang web được tốt nhất, việc làm quen với những điều này là thực sự cần thiết.</p><h4>Dòng lệnh ⚡️</h4><figure class=\"image\"><img src=\"https://topdev.vn/blog/wp-content/uploads/2020/08/10.jpg\" alt=\"frontend\" srcset=\"https://topdev.vn/blog/wp-content/uploads/2020/08/10.jpg 172w, https://topdev.vn/blog/wp-content/uploads/2020/08/10-150x150.jpg 150w\" sizes=\"100vw\" width=\"172\"></figure><p><i>Dòng lệnh – Command Line</i></p><p>Sự gia tăng của giao diện người dùng đồ họa – Graphic User Interfaces (GUI) vào máy tính là 1 trong những điều tuyệt nhất từng xảy ra. Sẽ dễ dàng hơn nhiều để trỏ và nhấp vào 1 menu đầy tương tác và sống động thay vì phải ngồi gõ và gõ.</p><blockquote><p><i>GUI khá hấp dẫn cả về việc phát triển web lẫn coding nữa. Chúng khá ổn định và tiện dụng. Nhưng 1 GUI đa năng sẽ có những hạn chế với 1 vài ứng dụng nhất định. Sẽ có lúc bạn cần mở 1 terminal trên máy tính để nhập các dòng lệnh để nhận được những gì bạn cần.</i></p></blockquote><p>Xem tiếp...</p><p>Đó là điểm khác biệt giữa việc máy tính của bạn chỉ mang lại những gì có sẵn trên bề nổi và có thể nhận được những gì bạn cần bằng cách đào sâu hơn bằng cách thủ công.</p><p>Ngay cả khi những công việc chính của bạn vẫn được thực hiện xong bằng GUI, các công ty sẽ thực sự ấn tượng và tín nhiệm bạn hơn với các kỹ năng frontend của mình nếu bạn thành thạo các dòng lệnh.</p><h3>Kỹ năng mềm ⚡️</h3><p>Cho dù có tích góp được bao nhiêu kỹ năng trong sự nghiệp của bạn, sẽ có những thứ luôn cần thiết cho công việc của bạn bên cạnh, đó là kỹ năng mềm. Nhất là đối với dân kỹ thuật thường các bạn cũng hơi rụt rè hay không được tốt trong việc giao tiếp. Hãy luôn trau dồi sự chuyên nghiệp của mình bất kỳ lúc nào trên con đường sự nghiệp đầy thú vị và sáng tạo này.&nbsp;</p><h2>Tổng kết ⚡️</h2><p>Trở thành 1 lập trình viên frontend vừa khó mà vừa dễ, hãy luôn trau chuốt, tỉ mỉ và chi tiết từng chút cho web hay ứng dụng của bạn được mượt mà và bắt mắt. Hãy luôn kiên nhẫn và luôn trao dồi thêm kiến thức, công nghệ mới nữa nhé.</p><p>Chúc các bạn sớm trở thành 1 lập trình viên frontend đầy kỹ năng và thành công trên sự nghiệp. 🤓</p>', 'upload/post/How-to-Learn-Python.jpg', 1, 4, '2020-09-03 09:20:11', '2020-09-03 09:21:29', 1, '10-ky-nang-quan-trong-de-tim-cong-viec-lap-trinh-vien-frontend-de-dang-hon', '1'),
(4, 'Xây dựng hệ thống Jenkins với hàng chục nghìn job', 'SPN là công ty top unicorn ở Silicon Valley, họ phát triển một communication tool tương tự như Skype, Slack. Tuy nhiên bằng cách mua lại một công ty về security là Perzoinc, họ đã tích hợp được thuật toán mã hóa của Perzoinc vào sản phẩm. Giúp Jenkins có độ bảo mật cực kì cao, được các doanh nghiệp tài chính, ngân hàng như HSBC, Citi Bank ưa chuộng và sử dụng.', '<p>Để đảm bảo sản phẩm được release liên tục nhanh chóng, do đó công ty đã có kế hoạch xây dựng một hệ thống CICD sử dụng <a href=\"https://topdev.vn/blog/continuous-integration-with-jenkins-bai-1-gioi-thieu-ve-ci-va-jenkins/\">Jenkins</a>. Tuy nhiên họ gặp phải nhiều thử thách sau đây:</p><p>Có 4 môi trường dev, qa, uat, prod, ngoài ra còn nhiều team như qa performance, mobile… Mỗi team muốn có một Jenkins riêng để sử dụng để tránh conflict.</p><p>Số lượng nhân viên công ty, outsource lên tới cả ngàn, số lượng job chạy tính ra cũng hàng chục ngàn, làm thế nào để Jenkins chạy ổn định.</p><p>Không thể build Jenkins này theo cách manual, cần build tự động để đảm bảo provision infra một cách nhanh chóng, giảm thiểu human mistake.</p><p>Cần monitor hệ thống Jenkins để đảm bảo performance, xử lý issue kịp thời.</p><p>Các kĩ sư của SPN để tạo một project gọi là WarpDrive. Tên một loại động cơ trong phim khoa học viễn tưởng, có khả năng “kéo không gian” khiến phi thuyền có thể bay với vận tốc cực lớn.</p><p>Để giải quyết khả năng high availably and scale. Jenkins được build trên nền K8S thành các cluster. Mỗi team muốn có CICD pipeline riêng sẽ được tạo cluster riêng.</p><p>Bằng các setting trong RBAC (Role base access control), mỗi member trong 1 team được cấp quyền nhất định như Admin, User, Mod.</p><p>1 cluster bao gồm 1 master node và nhiều minion, nơi các agent được deploy.</p><figure class=\"image\"><img src=\"https://lh5.googleusercontent.com/pJpYtcG5BRauNESgPa5-q8Yb9M4rwMEXF0g9GIy4Ry6D0-X6usVhquAMkMbxjujsB9FRcJUzUDujC2mpk9WWUz-y_KAYxwE6FWV_1hFMFsqjYdefZvvTY-K1QSr0OG_kXQyeTvw\" alt=\"Khi job Jenkins start, Jenkins master sẽ launch 1 con Jenkins agent (1 pod trong k8s), Jenkins agent sẽ chạy job, sau khi hoàn thành agent sẽ tự động bị destroy. Jenkins agent này run dưới dạng container, docker file được tạo và build riêng cho Jenkins agent, image up lên Google Cloud Registry\"></figure><p>Khi job start, master sẽ launch 1 con agent (1 pod trong k8s), agent sẽ chạy job, sau khi hoàn thành agent sẽ tự động bị destroy. agent này run dưới dạng container, docker file được tạo và build riêng cho agent, image up lên Google Cloud Registry.</p><p>Để đảm bảo master có thể launch, destroy agent. Các kĩ sư cài đặt 1 <a href=\"https://github.com/jenkinsci/kubernetes-plugin\">K8s jenkins plugin</a>, config để Jenkins có thể sử dụng docker images ở trên.</p><figure class=\"image\"><img src=\"https://lh5.googleusercontent.com/2skQ3TlUcTdnDUn_p81k1d-qIDb7aaxl707Asar2YrhIutXtZxREe3kE6pG2kaVUUovc3742b9SIV2UGN49cDKIVHx1YfWI5SU5UBy-7zloGA0qKKNsqYDErv8rqzA_-NXKRXbY\" alt=\"Tương tự Jenkins master cũng được build thành image từ dockerfile và up lên Google Registry. Các plugin của Jenkins cũng không cài đặt bằng tay, mà được định nghĩa trong 1 file txt, khi build image thì các plugin được tải và cài đặt. Cách đóng gói Jenkins master, slave thành docker tạo ra sự cơ động, portable, reusable\"></figure><p>Tương tự master cũng được build thành image từ dockerfile và up lên Google Registry. Các plugin của Jenkins cũng không cài đặt bằng tay, mà được định nghĩa trong 1 file txt, khi build image thì các plugin được tải và cài đặt. Cách đóng gói master, slave thành docker tạo ra sự cơ động, portable, reusable.</p><p>Điều quan trọng là việc build up và deploy Jenkins được thực hiện hoàn toàn bằng code, (Infra as Code), sử dụng các công cụ như DSL, Helm, Terraform.</p><figure class=\"image\"><img src=\"https://lh5.googleusercontent.com/YCbbfWTWorNfU_U-C66HWLs3Cru4LfODEGGTz8Cv107pfDjVrPYUa1xGKF9JfDzZkIErIf4bGizqiULKUiF_ZGB6kNcRStQwRfNB78-bNcUm4ugk2HqJBE0diHGJ68ngtqQA7ug\" alt=\"Điều quan trọng là việc build up và deploy Jenkins được thực hiện hoàn toàn bằng code, (Infra as Code), sử dụng các công cụ như DSL, Helm, Terraform.\"></figure><p>Nhờ provision infra tự động bằng code, SPN đã giảm thiểu được human mistake, deploy Jenkins rất nhanh chóng và có thể clone ra nhiều cluster khác nhau.</p><p>Khi đã deploy thành công thì việc tiếp theo là monitoring, để biết họ dùng công nghệ gì để monitoring, đón xem phần tiếp theo.</p>', 'upload/post/image3.png', 7, 4, '2020-09-03 09:51:33', '2020-09-03 09:51:41', 1, 'xay-dung-he-thong-jenkins-voi-hang-chuc-nghin-job', '1');
INSERT INTO `posts` (`id`, `title`, `description`, `content`, `thumbnail`, `category_id`, `writer_id`, `created_at`, `updated_at`, `is_active`, `slug`, `status`) VALUES
(5, 'Xử lý Date/Time dễ dàng với Carbon trong Laravel', 'Làm việc với ngày và giờ trong PHP không phải là nhiệm vụ dễ dàng gì. Chúng ta phải đối mặt với các vấn đề về thời gian, định dạng, nhiều tính toán, v.v.', '<h2>Carbon là gì?</h2><p>Carbon là một gói phần mềm được phát triển bởi Brian Nesbit mở rộng từ class DateTime của PHP. Từ phiên bản 5.3, Laravel đã tích hợp sẵn thư viện này vào Project. Việc sử dụng tốt thư viện này sẽ giúp bạn rất nhiều vấn đề về xử lý thời gian. Thư viện này giúp chúng ta rất nhiều trong việc xử lý datetime trong PHP. Điển hình như:</p><ul><li>Xử lý timezone.</li><li>Lấy ngày tháng hiện tại dễ dàng.</li><li>Convert datetime sang định dạng khác để đọc</li><li>Dễ dàng thao tác với datetime.</li><li>Chuyển đổi cú pháp là cụm từ tiếng anh sang datetime.</li></ul><h2>Cách sử dụng Carbon trong Laravel</h2><p>– Bạn cần import thư viện để sử dụng:</p><p>&lt;?php\r\nuse CarbonCarbon;</p><ul><li>Lấy thời gian:</li></ul><p>Carbon::now(); // thời gian hiện tại 2018-10-18 14:15:43\r\nCarbon::yesterday(); //thời gian hôm qua 2018-10-17 00:00:00\r\nCarbon::tomorrow(); // thời gian ngày mai 2018-10-19 00:00:00\r\n$newYear = new Carbon(\'first day of January 2018\'); // 2018-01-01 00:00:00</p><ul><li>Để lấy tgian hiện tại tại Việt Nam ta sẽ thêm locale của Việt nam như sau:</li></ul><p>echo Carbon::now(\'Asia/Ho_Chi_Minh\'); // 2018-10-18 21:15:43</p><ul><li>Để biết thêm về các nước khác bạn có thể tại trang chủ của PHP: <a href=\"http://php.net/manual/en/timezones.php\">Timezone</a></li><li>Bạn cũng có thể chuyển đổi kiểu datetime khác:</li></ul><p>$dt = Carbon::now(\'Asia/Ho_Chi_Minh\');\r\n\r\necho $dt-&gt;toDayDateTimeString(); &nbsp;Thu, Oct 18, 2018 9:16 PM\r\n\r\necho $dt-&gt;toFormattedDateString(); // Oct 18, 2018\r\n\r\necho $dt-&gt;format(\'l jS \\of F Y h:i:s A\'); // Thursday 18th of October 2018 09:18:57 PM\r\n\r\necho $dt-&gt;toDateString(); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; // 2018-10-18\r\necho $dt-&gt;toTimeString(); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; // 21:16:20\r\necho $dt-&gt;toDateTimeString(); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; // 2018-10-18 21:16:16</p><p>– Các bạn cũng có thể chỉ lấy ngày, tháng, năm, giờ, phút, giây, ngày của tuần, ngày của tháng, ngày của năm, tuần của tháng, tuần của năm, số ngày trong tháng. Thật dễ dàng :))</p><p>Carbon::now()-&gt;day; //ngày\r\n &nbsp; &nbsp;Carbon::now()-&gt;month; //tháng\r\n &nbsp; &nbsp;Carbon::now()-&gt;year; //năm\r\n &nbsp; &nbsp;Carbon::now()-&gt;hour; //giờ\r\n &nbsp; &nbsp;Carbon::now()-&gt;minute; //phút\r\n &nbsp; &nbsp;Carbon::now()-&gt;second; //giây\r\n &nbsp; &nbsp;Carbon::now()-&gt;dayOfWeek; //ngày của tuần\r\n &nbsp; &nbsp;Carbon::now()-&gt;dayOfYear; //ngày của năm\r\n &nbsp; &nbsp;Carbon::now()-&gt;weekOfMonth; //ngày của tháng\r\n &nbsp; &nbsp;Carbon::now()-&gt;weekOfYear; //tuần của năm\r\n &nbsp; &nbsp;Carbon::now()-&gt;daysInMonth; //số ngày trong tháng</p><p>– Có thể tăng giảm ngày, tháng, năm, giờ, phút, giây bằng hàm 2 hàm add() và sub()</p><p>$dt = Carbon::now();\r\n\r\necho $dt-&gt;addYears(5); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \r\necho $dt-&gt;addYear(); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\necho $dt-&gt;subYear(); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\necho $dt-&gt;subYears(5); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n\r\necho $dt-&gt;addMonths(60); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\necho $dt-&gt;addMonth(); &nbsp; &nbsp; &nbsp; \r\necho $dt-&gt;subMonth(); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \r\necho $dt-&gt;subMonths(60); &nbsp;\r\n\r\necho $dt-&gt;addWeeks(3); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \r\necho $dt-&gt;addWeek(); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\necho $dt-&gt;subWeek(); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\necho $dt-&gt;subWeeks(3); &nbsp; &nbsp; &nbsp; \r\n\r\necho $dt-&gt;addDays(29); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\necho $dt-&gt;addDay(); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \r\necho $dt-&gt;subDay(); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \r\necho $dt-&gt;subDays(29); \r\n\r\necho $dt-&gt;addHours(24); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\necho $dt-&gt;addHour(); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \r\necho $dt-&gt;subHour(); &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \r\necho $dt-&gt;subHours(24); &nbsp; \r\n...</p><p>– Ta cũng có thể so sánh với thời gian hiện tại một cách dễ dàng: Nó sẽ trả về là true hay false.</p><p>$now = Carbon::now();\r\n &nbsp; &nbsp;$now-&gt;isWeekday();\r\n &nbsp; &nbsp;$now-&gt;isWeekend();\r\n &nbsp; &nbsp;$now-&gt;isYesterday();\r\n &nbsp; &nbsp;$now-&gt;isToday();\r\n &nbsp; &nbsp;$now-&gt;isTomorrow();\r\n &nbsp; &nbsp;$now-&gt;isFuture()\r\n &nbsp; &nbsp;$now-&gt;isPast();\r\n &nbsp; &nbsp;$now-&gt;isBirthday(); // là ngày sinh nhật hay không</p><p>– Tính toán sự khác nhau giữa 2 datetime:</p><p>$dt = Carbon::create(2018, 10, 18, 21, 40, 16); //Tạo 1 datetime\r\n &nbsp; &nbsp;$now = Carbon::now();\r\n &nbsp; &nbsp;echo $now-&gt;diffInSeconds($dt);\r\n &nbsp; &nbsp;echo $now-&gt;diffInMinutes($dt);\r\n &nbsp; &nbsp;echo $now-&gt;diffInHours($dt);\r\n &nbsp; &nbsp;echo $now-&gt;diffInDays($dt);\r\n &nbsp; &nbsp;echo $now-&gt;diffInMonths($dt);\r\n &nbsp; &nbsp;echo $now-&gt;diffInYears($dt);</p><p>– Như trên facebook các bạn thấy các bài viết sẽ có trạng thái là 1 phút trước, 1 giờ trước chẳng hạn Carbon cũng hỗ trợ các bạn phần này luôn:</p><p>Carbon::setLocale(\'vi\'); // hiển thị ngôn ngữ tiếng việt.\r\n &nbsp; &nbsp;$dt = Carbon::create(2018, 10, 18, 14, 40, 16);\r\n &nbsp; &nbsp;$dt2 = Carbon::create(2018, 10, 18, 13, 40, 16);\r\n &nbsp; &nbsp;$now = Carbon::now();\r\n &nbsp; &nbsp;echo $dt-&gt;diffForHumans($now); //12 phút trước\r\n &nbsp; &nbsp;echo $dt2-&gt;diffForHumans($now); //1 giờ trước</p><p>Trên đây mình chỉ liệt kê những kiểu thường dùng, ngoài ra còn rất nhiều các kiểu khác nữa, bạn có thể tham khảo tại trang chủ của Carbon tại <a href=\"https://carbon.nesbot.com/docs\">carbon</a>.</p>', 'upload/post/14287acc-b5cb-46db-b8b4-e3ffe652fc0d.png', 2, 4, '2020-09-03 09:53:38', '2020-09-03 09:53:46', 1, 'xu-ly-datetime-de-dang-voi-carbon-trong-laravel', '1'),
(6, 'Tại sao không nên lưu trữ data user trên Local Storage?', 'Có một vấn đề: hầu hết những thứ xấu về local storage đều không quá quan trọng. Bạn vẫn có thể dùng nó nhưng app sẽ chậm hơn một chút và nhiều phiền toái cho dev. Nhưng vấn đề bảo mật thì khác. Model bảo mật của local storage rất rất quan trọng để biết và nó hoàn toàn ảnh hưởng đến trang web của bạn theo nhiều cách khác nhau.', '<p>Còn vấn đề của local storage đó nó <i>không an toàn</i>! Hoàn toàn không. Mọi người đều dùng local storage để store thông tin nhạy cảm như session data, user detail và tất cả những thứ bạn không muốn post công khai trên Facebook.</p><p>Local storage không được design như một cơ chế storage an toàn trên browser. Nó được design để store các string đơn giản mà dev có thể dùng để build các app single page phức tạp hơn một chút. Vậy thôi.</p><p>Thứ nguy hiểm nhất trên thế giới là gì? JavaScript!</p><p>Hãy thử nghĩ xem: khi bạn store thông tin nhạy cảm lên local storage, bạn cũng đang làm một trong những việc liều lĩnh nhất thế giới là store thông tin lên công cụ tệ nhất mọi thời đại. Nếu bị&nbsp;tấn công cross-site scripting&nbsp;(XSS) thì sao? Tôi sẽ không kể lê thê hết về XSS đâu, nhưng tóm tắt là như thế này:</p><p>Nếu một attacker có thể run JavaScript trên wesite của bạn, họ có thể retrive mọi data bạn đã lưu trong local storage và gửi nó đi các domain khác của chúng. Nó có nghĩa là bất kì thứ gì nhạy cảm bạn có đều sẽ được công khai.</p><p>Bây giờ, có thể bạn sẽ nghĩ “Vậy thì sao? Website của tôi rất an toàn. Không một ai có thể run JavaScript trên website của tôi được.”</p><p>Nếu website của bạn thật sự an toàn và không kẻ nào có thể làm vậy thì căn bản là bạn an toàn nhưng thực tế thì nó rất khó trở nên như vậy.&nbsp;Nếu website của bạn chứa bất kì code JavaScript bên thứ ba nào gồm source ngoài domain:</p><ul><li>Links đến bootstrap</li><li>Links đến jQuery</li><li>Links đến Vue, <a href=\"https://topdev.vn/viec-lam-it?q=React\">React</a>, Angular, etc.</li><li>Links đến ad network code bất kì</li><li>Links&nbsp;đến Google Analytics</li><li>Links đến tracking code bất kì</li></ul><p>Ví dụ website của bạn có nhúng&nbsp;script tag dưới đây:</p><p>&lt;script src=\"https://awesomejslibrary.com/minified.js\"&gt;&lt;/script&gt;</p><p>Trong trưởng hợp này, nếu&nbsp;awesomejslibrary.com bị hack và script&nbsp;minified.js&nbsp;bị thay đổi:</p><ul><li>Loop mọi data trong local storage</li><li>Gửi nó qua API được build để thu thập info bị mất</li></ul><p>… thì lúc đó bạn tiêu rồi. Lúc này kẻ attack đã có thể xài bất cứ gì bạn có trong local storage và bạn chả bao giờ phát hiện được. Nhưng trên thực tế, chuyện này cũng khá hiếm.</p><p>Với nhiều công ty, team marketing trực tiếp quản lý public website dùng các&nbsp;WYSIWYG editors và tools khác nhau. Bạn có chắc là không có phần nào trên site của bạn không dùng JavaScript bên thứ ba không? Dám cá là không.</p><p>Lời cảnh báo và giảm risk về bảo mật: <strong>làm ơn đừng store cái gì lên local storage cả.</strong></p><h2>PSA: Đừng store các JSON Web Tokens trên Local Storage</h2><figure class=\"image\"><img src=\"https://res.cloudinary.com/practicaldev/image/fetch/s--YL04pAyR--/c_limit%2Cf_auto%2Cfl_progressive%2Cq_auto%2Cw_880/https://thepracticaldev.s3.amazonaws.com/i/7ejjtcb7tkcqa972q9gd.png\" alt=\"Stick Figure with Stop Sign\"></figure><p>Ngoài khuyên bạn tránh xa local storage, tôi nghĩ cũng nên nói về&nbsp;<a href=\"https://topdev.vn/blog/json-web-token-jwt-la-gi/\">JSON Web Tokens (JWT)</a>. Một trong những vấn đề bảo mật tôi thấy là có những người store&nbsp;JWTs (session data) trên&nbsp;local storage. Nhiều người không nhận ra rằng&nbsp;JWTs cũng giống hệt như username và password.</p><p>Nếu attacker&nbsp;lấy được bản copy của JWT, chúng có thể gửi request đi trên danh nghĩa của bạn và bạn sẽ không biết được. Hãy xem nó như thông tin credit card của mình hoặc password: đừng lưu trữ nó trên local storage.</p><p>Có rất nhiều tutorial, video Youtube, và cả các lớp programming tại trường đại học và coding boot camp dạy cho các dev để store JWT trên local storgae như một cơ chế mặc định. Điều này rất không đúng. Nếu bạn nghe ai đó nói bạn như vậy, tránh xa ngay. Thế thì chẳng lẽ không dùng local storage nữa à? Vậy data user tui muốn lưu thì có cách nào thay thế không man? <a href=\"https://topdev.vn/blog/dung-gi-de-luu-tru-data-thay-the-local-storage/\">Mời anh em đọc bài sau</a>.</p>', 'upload/post/wpj8oyxs3qhog709aa24.png', 1, 4, '2020-09-03 09:56:20', '2020-09-03 09:56:23', 1, 'tai-sao-khong-nen-luu-tru-data-user-tren-local-storage', '1'),
(7, 'Lập TrìnhBackendCông nghệ Xác thực và phân quyền trong Microservices', 'Xác thực (authentication, trả lời câu hỏi bạn là ai) và phân quyền (authorization, trả lời câu hỏi bạn có thể làm được gì) microservices luôn là thành phần không thể thiếu của mọi hệ thống, nhưng mức độ áp dụng thì lại tùy thuộc vào từng giai đoạn.', '<h2>Bắt đầu từ Monolithic</h2><p>Tiki xuất phát là 1 hệ thống monolithic, thông thường ở hệ thống như vậy sẽ có 1 module chung quản lý việc xác thực và phân quyền, mỗi user sau khi đăng nhập sẽ được cấp cho 1 Session ID duy nhất để định danh.</p><p>Phía client có thể lưu Session ID lại dưới dạng cookie và gửi kèm nó trong mọi request. Hệ thống sau đó sẽ dùng Session ID được gửi đi để xác định danh tính của user truy cập, để người dùng không cần phải nhập lại thông tin đăng nhập lần sau.</p><figure class=\"image\"><img src=\"https://cdn-images-1.medium.com/max/1600/1*U1bcAQmZdmwodHxARgmB1Q.png\"></figure><p>Khi Session ID được gửi lên, server sẽ xác định được danh tính của người dùng gắn với Session ID đó, đồng thời sẽ kiểm tra quyền của user xem có được truy cập tác vụ đó hay không.</p><p>Giải pháp <a href=\"https://topdev.vn/blog/session-la-gi/\">session</a> và cookie vẫn có thể sử dụng, tuy nhiên ngày nay chúng ta có nhiều yêu cầu hơn, chẳng hạn như các ứng dụng Hybrid hoặc SPA (Single Page Application) có thể cần truy cập tới nhiều hệ thống backend khác nhau, vì vậy session và cookie lấy từ 1 server có thể không sử dụng được ở server khác.</p><h2>Bài toán khó Microservices</h2><p>Trong kiến trúc microservices, hệ thống được chia nhỏ thành nhiều hệ thống con, đảm nhận các nghiệp vụ và chức năng khác nhau. Mỗi hệ thống con đó cũng cần được xác thực và phân quyền, nếu xử lý theo cách của kiến trúc Monolithic ở trên chúng ta sẽ gặp các vấn đề sau:</p><ul><li>Mỗi service có nhu cầu cần phải tự thực hiện việc xác thực và phân quyền ở service của mình. Mặc dù chúng ta có thể sử dụng các thư viện giống nhau ở mỗi service để làm việc đó tuy nhiên chi phí để bảo trì thư viện chung đó với nhiều nền tảng ngôn ngữ khác nhau là quá lớn.</li><li>Mỗi service nên tập trung vào xây dựng các nghiệp vụ của mình, việc xây dựng thêm logic về phân quyền làm giảm tốc độ phát triển và tăng độ phức tạp của các service.</li><li>Các service thông thường sẽ cung cấp các interface dưới dạng <a href=\"https://topdev.vn/blog/restful-api-la-gi/\">RESTful API</a>, sử dụng protocol HTTP. Các HTTP request sẽ được đi qua nhiều thành phần của hệ thống. Cách truyền thống sử dụng session ở server (stateful) sẽ gây khó khăn cho việc mở rộng hệ thống theo chiều ngang.</li><li>Service sẽ được truy cập từ nhiều ứng dụng và đối tượng sử dụng khác nhau, có thể là người dùng, 1 thiết bị phần cứng, 3rd-party, crontab hay 1 service khác. Việc xác định định danh (identity) và phân quyền (authorization) ở nhiều ngữ cảnh (context) khác nhau như vậy là vô cùng phức tạp.</li></ul><figure class=\"image\"><img src=\"https://cdn-images-1.medium.com/max/1600/1*DEVCqCWsRE9PXK-t2F3Wow.png\"></figure><p>Dưới đây là một số giải pháp, kỹ thuật và hướng tiếp cận mà Tiki đã áp dụng cho bài toán này.</p><h2>Định danh</h2><h2>Sử dụng&nbsp;JWT</h2><p><a href=\"https://topdev.vn/blog/json-web-token-jwt-la-gi/\">JWT (Json Web Token)</a> là 1 loại token sử dụng chuẩn mở dùng để trao đổi thông tin kèm theo các HTTP request. Thông tin này được xác thực và đánh dấu 1 cách tin cậy dựa vào chữ ký. JWT có rất nhiều ưu điểm so với session.</p><ul><li>Stateless, thông tin không được lưu trữ trên server.</li><li>Dễ dạng phát triển, mở rộng.</li><li>Performance tốt hơn do server đọc thông tin ngay trong request (nếu session thì cần đọc ở storage hoặc database)</li></ul><figure class=\"image\"><img src=\"https://cdn-images-1.medium.com/max/1600/1*FM7TA5S2g375j9h46VjaVQ.png\"></figure><h2>Mã hóa RSA cho&nbsp;JWT</h2><p>Phần chữ ký sẽ được mã hóa lại bằng HMAC hoặc RSA.</p><ul><li>HMAC: đối tượng khởi tạo JWT (token issuer) và đầu nhận JWT (token verifier) sử dụng chung 1 mã bí mật để mã hóa và kiểm tra.</li><li>RSA: sử dụng 1 cặp key, đối tượng khởi tạo JWT sử dụng Private Key để mã hóa, đầu nhận JWT sử dụng Public Key để kiểm tra.</li></ul><p>Như vậy với HMAC, cả 2 phía đều phải chia sẻ mã bí mật cho nhau, và đầu nhận JWT hoàn toàn có thể khởi tạo 1 mã JWT khác hợp lệ dựa trên mã bí mật đó. Còn với RSA, đầu nhận sử dụng Public Key để kiểm tra nhưng không thể khởi tạo được 1 JWT mới dựa trên key đó. Vì vậy mã hóa sử dụng RSA giúp cho việc bảo mật chữ ký tốt hơn khi cần chia sẻ JWT với nhiều đối tượng khác nhau.</p><h2>Sử dụng Opaque Token khi muốn để kiểm soát phiên làm việc tốt&nbsp;hơn</h2><p>Opaque Token (còn được gọi là stateful token) là dạng token không chứa thông tin trong nó, thông thường là 1 chuỗi ngẫu nhiên và yêu cầu 1 service trung gian để kiểm tra và lấy thông tin. Ví dụ:</p><p>{\r\n\"access_token\": \"c2hr8Jgp5jBn-TY7E14HRuO37hEK1o_IOfDzbnZEO-o.zwh2f8SPiLKbcMbrD_DSgOTd3FIfQ8ch2bYSFi8NwbY\",\r\n\"expires_in\": 3599,\r\n\"token_type\": \"bearer\"\r\n}</p><p>Transparent Token (còn được gọi là stateless token) thông thường chính là dạng JWT, token này bản thân chứa thông tin và không cần 1 service trung gian để kiểm tra. Hãy cùng so sánh 2 loại token này.</p><figure class=\"image\"><img src=\"https://cdn-images-1.medium.com/max/1600/1*widC_8jM2_yHcvBSgWM1VA.png\"></figure><p>Như vậy ta có thể thấy Transparent Token mang lại tốc độ tốt hơn, đơn giản dễ sử dụng với cả 2 phía, không phù thuộc vào 1 server trung tâm để kiểm tra. Còn Opaque Token kiểm soát tốt hơn các phiên làm việc của đối tượng, chẳng hạn khi bạn muốn thoát tất cả các thiết bị đang đăng nhập.</p><h2>OAuth 2</h2><p>Các token sẽ được khởi tạo thông qua OAuth 2, là phương thức chức thực phổ biến nhất hiện nay, mà qua đó một service, hay một ứng dụng bên thứ 3 có thể đại điện (delegation) cho người dùng truy cập vào 1 tài nguyên của người dùng nằm trên 1 dịch vụ nào đó.</p><p>OAuth 2 là chuẩn mở, có đầy đủ tài liệu, thư viện ở tất cả các ngôn ngữ khác nhau giúp cho việc tích hợp, phát triển dựa trên nó trở nên dễ dàng và nhanh chóng.</p><h2>Kiến trúc cho xác thực và phân&nbsp;quyền</h2><p>Sau khi đã có định danh và giao thức dùng để giao tiếp, câu hỏi tiếp theo là cần trả lời câu hỏi đối tượng với định danh đó có quyền thực hiện 1 hành động, truy cập 1 tài nguyên nào đó hay không. Ở Tiki, bên cạnh các service được xây dựng mới, vẫn còn tồn tại các hệ thống cũ (legacy) chạy song song, thế nên hiện nay Tiki có 2 cách thức tổ chức phân quyền như dưới đây.</p><h2>Xác thực, phân quyền tại lớp&nbsp;rìa</h2><figure class=\"image\"><img src=\"https://cdn-images-1.medium.com/max/1600/1*eNhwQa_pE0kQg0k6aMbFxg.png\"></figure><p>Theo mô hình tất cả mọi request sẽ được xác thực khi đi qua API Gateway hoặc BFF (Backend For Frontend). BFF chính là lớp service ở rìa (Edge Service) được thiết kế riêng cho từng ứng dụng (ví dụ IOS, Android, Management UI). Chúng ta sẽ đặt xác thực và phân quyền ở lớp rìa này</p><ul><li>API Gateway sẽ bắt buộc tất cả request sẽ cần gửi kèm token để định danh</li><li>Nếu token này là JWT (đối với OpenID Connect), Gateway có thể kiểm tra tính hợp lệ của token thông qua chữ ký (signature), thông tin (claim) hoặc đối tượng khởi tạo (issuer)</li><li>Nết token này là Opaque Token, Gateway có thể phân tích (introspect) token, đổi (exchange) lấy JWT và truyền tiếp vào trong cho các services.</li><li>API Gateway hoặc BFF kiểm tra các policy xem có hợp lệ hay không thông qua Authorization Server trung tâm.</li><li>Các microservices không thực hiện lớp xác thực và phân quyền nào, có thể tự do truy cập bên trong vùng nội bộ (internal network).</li></ul><figure class=\"image\"><img src=\"https://cdn-images-1.medium.com/max/1600/1*iwpQuudkuE1qmI582xhWzg.png\"></figure><p>Mô hình này có điểm tương đồng với kiến trúc Monolithic khi đặt xác thực phân quyền tại 1 số service nhất định, việc xây dựng và bảo trì sẽ tốn chi phí nhỏ hơn, tuy nhiên sẽ để lộ 1 khoảng trống bảo mật rất lớn ở lớp trong do các service có thể tự do truy cập lẫn nhau.</p><p>Chúng ta có thể đặt 1 số rule ở góc độ network đối với các service bên trong này tuy nhiên các rule này sẽ tương đối đơn giản và không thể đáp ứng được các nghiệp vụ truy cập dữ liệu lẫn nhau giữa các team/service (mở rộng ra là các công ty nội bộ) độc lập nhau.</p><p><strong>Video:&nbsp;Mở rộng tech company đang phát triển nhanh với e-commerce metrics</strong></p><p>&nbsp;</p><h2>Xác thực, phân quyền tại các&nbsp;service</h2><p>Ở mô hình này, mỗi service (trừ 1 số ngoại lệ) khi được thiết kế và xây dựng các giao tiếp APIs (API Interface) mở rộng được và&nbsp;<strong>có thể phục vụ cho thế giới bên ngoài</strong>. Một service hôm nay được xây dựng cho các nghiệp vụ bên trong nội bộ công ty, nhưng ngày mai có thể sẵn sàng để mở ra cho các đối tác, các lập trình vên ngoài.</p><p>Điều này sẽ giúp cho các service/team chủ động được hoàn toàn về các tài nguyên hiện có, tài nguyên đó được cấp cho những đối tượng nào, được truy cập từng phần hay toàn phần…</p><p>Để làm được việc này, vai trò rất lớn sẽ nằm ở service IAM (Identity Access Management), IAM nắm giữ các định danh của toàn bộ các đối tượng (user, service, command…) cùng với các bộ luật phân quyền chi tiết cho từng loại tài nguyên.</p><figure class=\"image\"><img src=\"https://cdn-images-1.medium.com/max/1600/1*i7Pu0-16TQzEzhVAlmsKyQ.png\"></figure><p>Việc mỗi service phải tự thực hiện việc xác thực, phân quyền sẽ làm tăng chi phí khi xây dựng các service, bên ngoài các nghiệp vụ chính thì cần thêm lớp middleware để giao tiếp với IAM.</p><p>Tuy nhiên các service sẽ có được sự tự chủ hoàn toàn, chủ động về việc cung cấp tài nguyên cho các đối tượng, và tăng tốc phát triển hơn vì nhiều trường hợp client có thể truy cập thẳng tới các service mà không cần phát triển thêm lớp BFF ở giữa.</p><h2>Access Control</h2><p>Xây dựng hệ thống luật (rule) hiệu quả không bao giờ là dễ dàng, khi yêu cầu về nghiệp vụ tăng cao kéo theo yêu cầu về phân quyền càng phức tạp. Hãy lấy 1 ví dụ cụ thể để làm rõ, mỗi ứng dùng thông thường sẽ gán quyền cho 1 thành viên cụ thể (ví dụ John được quyền tạo sản phẩm). Mở rộng ra trong 1 hệ thống microservices, đối tượng ở đây có thể là người dùng, service, crontab…</p><p>Có 1 vài cách tiếp cận cho việc phân quyền như trên, hãy thử đi qua các cách khác nhau để có nhiều góc nhìn khác nhau.</p><h2>Access Control List&nbsp;(ACL)</h2><figure class=\"image\"><img src=\"https://cdn-images-1.medium.com/max/1600/1*nZzLbDK74ohKfa9utoaEzw.png\"></figure><p>Trong ví dụ trên các bạn có thể thấy 1 ma trận của đối tượng và quyền, nó gần tương đương với cách quản lý file trên Linux (chmod) và phù hợp với những ứng dụng có ít đối tượng. Khi hệ thống lớn lên mô hình này sẽ không thể quản lý nổi bởi ma trận được tạo ra quá lớn và phức tạp. Do vậy và mô hình này không còn phổ biến hiện tại.</p><h2>Role-Based Access Control&nbsp;(RBAC)</h2><p>RBAC liên kết đối tượng tới các vai trò (role), và từ vai trò tới các quyền. Chẳng hạn vai trò&nbsp;<strong>Administrator</strong>có thể thừa hưởng mọi quyền mà vai trò&nbsp;<strong>Manager&nbsp;</strong>có, điều này giúp làm giảm độ phức tạp của ma trận quyền, thay vì gán toàn bộ quyền cho&nbsp;<strong>Administrator&nbsp;</strong>thì chỉ cần cho&nbsp;<strong>Administrator&nbsp;</strong>thừa hưởng các quyền của&nbsp;<strong>Manager</strong>.</p><figure class=\"image\"><img src=\"https://cdn-images-1.medium.com/max/1600/1*uaumdtBOoq88knZR8J42UA.png\"></figure><p>RBAC rất phổ biến và bạn có thể thấy ở mọi nơi, so với ACL thì RBAC giúp giảm thiểu độ phức tạp khi số lượng đối tượng + quyền tăng cao. Tuy nhiên RBAC chưa thỏa mãn được 1 số trường hợp, ví dụ khi cấp quyền 1 sản phẩm chỉ được sửa bởi người tạo, người dùng nằm trong 1 phòng ban xác định hoặc quyền phân biệt với các người dùng từ nhiều hệ thống (tenant) khác nhau.</p><h2>Policy-Based Access Control&nbsp;(PBAC)</h2><p>PBAC được xây dựng dựa trên Attribute Based Access Control (ABAC), qua đó định nghĩa các quyền để diễn đạt một yêu cầu được cho phép hay từ chối. ABAC sử dụng các thuộc tính (attribute) để mô tả cho đối tượng cần được kiểm tra, mỗi thuộc tính là 1 cặp key-value ví dụ&nbsp;<strong>Department&nbsp;</strong>=&nbsp;<strong>Marketing</strong>. Nhờ đó ABAC có thể giúp phân quyền mịn hơn, phù hợp với nhiều ngữ cảnh (context) và nghiệp vụ (business rules) khác nhau.</p><figure class=\"image\"><img src=\"https://cdn-images-1.medium.com/max/1600/1*cNTfK8um2-k8TTJLH-9qfw.png\"></figure><p>PABC được định nghĩa thông qua các policy được viết dưới dạng 1 ngôn ngữ chung XACML (eXtensible Access Control Markup Language). Một policy định nghĩa 4 đối tượng subject, effect, action và resource. Ví dụ&nbsp;<strong>john&nbsp;</strong>(subject) được&nbsp;<strong>allowed</strong>(effect) để mà&nbsp;<strong>delete</strong>(action) product với ID&nbsp;<strong>john-leman</strong>(resource). Nhìn qua thì nó gần giống với cách định nghĩa 1 ACL.</p><p>{\r\n\"subjects\": [\"user:john\"],\r\n\"effect\": \"allow\",\r\n\"actions\": [\"catalog:delete\"]\r\n\"resources\": [\"product:john-leman\"],\r\n}</p><p>Chúng ta có thể bổ sung subject, action cũng như resource thêm vào policy nếu muốn.</p><p>{\r\n\"subjects\": [\"user:john\", \"user:katy\", \"user:perry\"],\r\n\"effect\": \"allow\",\r\n\"actions\": [\"catalog:delete\", \"catalog:update\", \"catalog:publish\"]\r\n\"resources\": [\"product:john-leman\", \"product:john-doe\"]\r\n}</p><p>Bạn có thể thắc mắc thế thì PBAC khác gì ACL, và đây là sự khác biệt</p><h4><strong>Luật ưu tiên</strong></h4><ul><li>Mặc định nếu không có policy phù hợp, yêu cầu sẽ bị từ chối</li><li>Nếu không có policy nào&nbsp;<strong>deny</strong>, có ít nhất một policy&nbsp;<strong>allow&nbsp;</strong>thì yêu cầu được cho phép</li><li>Nếu có 1 policy là&nbsp;<strong>deny</strong>, thì yêu cầu luôn bị từ chối</li></ul><h4><strong>Regular Expression</strong></h4><p>Các policy cho phép khai báo sử dụng regular expression, như ở ví dụ này cho phép tất cả người dùng được xem thông tin product.</p><p>{\r\n\"subjects\": [\"user:&lt;.*&gt;\"],\r\n\"effect\": \"allow\",\r\n\"actions\": [\"catalog:read],\r\n\"resources\": [\"product:&lt;.*&gt;\"]\r\n}</p><h4><strong>Điều kiện</strong></h4><p>Các policy có thể bổ sung các điều kiện để thu hẹp phạm vi của quyền, ví dụ như chỉ áp dụng cho 1 dải IP nhất định, hoặc chỉ cho phép người tạo sản phẩm được sửa sản phẩm đó.</p><p>{\r\n\"subjects\": [\"user:ken\"],\r\n\"actions\" : [\"catalog:delete\", \"catalog:create\", \"catalog:update\"],\r\n\"effect\": \"allow\",\r\n\"resources\": [\"products:&lt;.*&gt;\"],\r\n\"conditions\": {\r\n\"IpAddress\": {\r\n\"addresses\": [\r\n\"192.168.0.0/16\"\r\n]\r\n}\r\n}\r\n}</p><h2>Tổng kết</h2><p>Việc liên tục mở rộng nghiệp vụ và hệ thống đòi hỏi các service phải tự xác thực, qua đó không phân biệt service đó là bên trong (internal) hay bên ngoài (external), giúp các team dễ dàng mở rộng tích hợp với nhau. Việc này đòi hỏi mô hình xác thực chung phải hoạt động ổn định, tối ưu và đáp ứng được hiệu năng cao.</p>', 'upload/post/1_U1bcAQmZdmwodHxARgmB1Q.png', 2, 4, '2020-09-03 09:57:59', '2020-09-03 09:58:03', 1, 'lap-trinhbackendcong-nghe-xac-thuc-va-phan-quyen-trong-microservices', '1');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `reviews` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `reviews`, `user_id`, `course_id`, `created_at`, `status`, `updated_at`) VALUES
(1, 'khóa học này rất bổ ích', 1, 1, '2020-08-26 08:39:44', '1', '2020-08-26 09:16:36'),
(2, 'tệ hết sức tệ', 1, 2, '2020-08-26 09:34:06', '0', '2020-08-26 09:34:12'),
(3, 'các bạn khác nên học khóa học này', 1, 2, '2020-08-26 09:36:29', '1', '2020-08-26 09:37:29');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(255) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `name`, `avatar`, `about`, `work_place`) VALUES
(1, 'tuannguyensn2001', 'devpro2001@gmail.com', NULL, '$2y$10$WDYiGnpbeeq8rkU6.vzMRewVbURo8.4ZRL6HEr263fAS.ap0pv65K', NULL, '2020-07-14 01:55:49', '2020-08-19 23:27:42', 1, 'Nguyễn Văn Tuấn', 'upload/users/avatar/555555.jpg', 'hellos', 'HUS'),
(2, 'admintest', 'admintest@gmail.com', NULL, '$2y$10$4Aryn8/rJnEm5BLIBRdduusuZaRM.C/LyeIaj6.eN8tJFHDj/EwTS', NULL, '2020-08-18 19:49:40', '2020-08-19 08:36:44', 1, 'Admin', 'upload/users/avatar/70887935_468320187097119_5797944286091673600_n.jpg', NULL, NULL),
(3, 'admintest1', 'admintest1@gmail.com', NULL, '$2y$10$U8UZhJ00CsmJLgfV8BQiSOiT0bitAhhBBr7R99OrMbRX1IM0s1l5y', NULL, '2020-08-23 11:28:10', '2020-08-23 11:28:10', 1, NULL, 'upload/users/avatar/default.png', NULL, NULL),
(4, 'admintest2', 'admintest2@gmail.com', NULL, '$2y$10$enDyZNc404LCGleVg2V4seqf0e0oD1c33QZPD8irAg9ZQsRnuiucq', NULL, '2020-08-23 11:28:10', '2020-08-23 11:28:10', 1, NULL, 'upload/users/avatar/default.png', NULL, NULL),
(5, 'admintest3', 'admintest3@gmail.com', NULL, '$2y$10$foD6d9I0VlHoFHTeGDFQuOIKobsqQgddRPT2xWdS1/lKfzPXgLfMi', NULL, '2020-08-23 11:28:11', '2020-08-23 11:28:11', 1, NULL, 'upload/users/avatar/default.png', NULL, NULL),
(6, 'admintest4', 'admintest4@gmail.com', NULL, '$2y$10$sQTc0nPPmr1r2lDo9mkP6ePcoDb.AfMd.wVr.B98X7zuQBB1VndEG', NULL, '2020-08-23 11:28:11', '2020-08-23 11:28:11', 1, NULL, 'upload/users/avatar/default.png', NULL, NULL),
(7, 'admintest5', 'admintest5@gmail.com', NULL, '$2y$10$33XMFtfazle6sMq2nyMGlOjtWH5emfauhrGDEAmn8BTyv0bsC2ktC', NULL, '2020-08-23 11:28:11', '2020-08-23 11:28:11', 1, NULL, 'upload/users/avatar/default.png', NULL, NULL),
(8, 'admintest6', 'admintest6@gmail.com', NULL, '$2y$10$y2PPkZSc0LTGhgvdp/yhfOYpxFLcnSqPeZvEi3oQ/XkAgKZqvY3du', NULL, '2020-08-23 11:28:11', '2020-08-23 11:28:11', 1, NULL, 'upload/users/avatar/default.png', NULL, NULL),
(9, 'admintest7', 'admintest7@gmail.com', NULL, '$2y$10$uqVyuG3bGpf.cNK2hD6lkeALrqLyRh63MUNwYOiaiRcsaH7VDSj4K', NULL, '2020-08-23 11:28:11', '2020-08-23 11:28:11', 1, NULL, 'upload/users/avatar/default.png', NULL, NULL),
(10, 'admintest8', 'admintest8@gmail.com', NULL, '$2y$10$BExWlpftKK8i.9lRpwOL9OgoZjbQoGjOiylmtTGf5tw04Rt1qig6m', NULL, '2020-08-23 11:28:11', '2020-08-23 11:28:11', 1, NULL, 'upload/users/avatar/default.png', NULL, NULL),
(11, 'admintest9', 'admintest9@gmail.com', NULL, '$2y$10$TSKz/Iz7Msh7D78SdDBz4OuC.YVSphWj9KEckEN0QPMl7CETJBP0.', NULL, '2020-08-23 11:28:11', '2020-08-23 11:28:11', 1, NULL, 'upload/users/avatar/default.png', NULL, NULL),
(12, 'admintest10', 'admintest10@gmail.com', NULL, '$2y$10$q1Q84OatI3vBtzRe6zNydOvZ42yt84gCKTc0pf197Hbeu1FduWcMO', NULL, '2020-08-23 11:28:11', '2020-08-23 11:28:11', 1, NULL, 'upload/users/avatar/default.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertocourse`
--

CREATE TABLE `usertocourse` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` varchar(255) DEFAULT NULL,
  `type` int(255) DEFAULT NULL COMMENT '1: student , 2:instructors'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertocourse`
--

INSERT INTO `usertocourse` (`id`, `user_id`, `course_id`, `created_at`, `updated_at`, `is_active`, `type`) VALUES
(1, 1, 1, '2020-08-19 10:10:03', '2020-08-23 11:34:46', '0', 1),
(2, 1, 2, '2020-08-19 11:00:17', '2020-08-24 08:52:45', '1', 1),
(3, 2, 6, '2020-08-19 11:01:40', '2020-08-23 02:25:29', '1', 2),
(4, 1, 3, '2020-08-19 19:24:40', '2020-08-23 03:42:10', '1', 1),
(5, 1, 5, '2020-08-20 19:24:16', '2020-08-20 19:27:06', '1', 2),
(6, 1, 4, '2020-08-20 19:24:18', '2020-08-23 03:38:20', '1', 2),
(7, 2, 2, '2020-08-20 19:56:04', '2020-08-20 19:56:04', '1', 2),
(8, 2, 3, '2020-08-20 19:56:06', '2020-08-20 19:56:06', '1', 2),
(9, 2, 4, '2020-08-20 19:56:06', '2020-08-20 19:56:06', '1', 2),
(10, 1, 6, '2020-08-20 19:57:32', '2020-08-23 02:28:09', '1', 2),
(11, 1, 4, '2020-08-23 03:43:54', '2020-08-23 03:43:54', '1', 1),
(12, 1, 5, '2020-08-23 03:44:01', '2020-08-23 11:34:47', '0', 1),
(13, 1, 6, '2020-08-23 03:44:03', '2020-08-23 03:44:03', '1', 1),
(14, 2, 3, '2020-08-23 03:44:18', '2020-08-23 03:44:18', '1', 1),
(15, 2, 2, '2020-08-23 03:44:19', '2020-08-23 03:44:19', '1', 1),
(16, 2, 6, '2020-08-23 03:44:25', '2020-08-23 03:44:25', '1', 1),
(17, 2, 4, '2020-08-23 03:44:26', '2020-08-23 03:44:26', '1', 1),
(18, 5, 2, '2020-08-23 11:28:34', '2020-08-23 11:28:34', '1', 1),
(19, 2, 1, '2020-08-23 11:34:40', '2020-08-23 11:34:40', '1', 1),
(20, 5, 6, '2020-08-23 11:34:58', '2020-08-23 11:34:58', '1', 1),
(21, 5, 3, '2020-08-23 11:35:00', '2020-08-23 11:35:00', '1', 1),
(22, 3, 2, '2020-08-23 11:35:16', '2020-08-23 11:35:16', '1', 1),
(23, 3, 6, '2020-08-23 11:35:16', '2020-08-23 11:35:16', '1', 1),
(24, 3, 3, '2020-08-23 11:35:17', '2020-08-23 11:35:17', '1', 1),
(25, 4, 1, '2020-08-23 11:56:26', '2020-08-23 11:56:26', '1', 1),
(26, 7, 2, '2020-08-24 07:24:54', '2020-08-24 07:24:54', '1', 1),
(27, 8, 2, '2020-08-24 07:25:02', '2020-08-24 07:25:02', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `work_place` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`id`, `name`, `username`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `status`, `avatar`, `about`, `work_place`) VALUES
(3, 'Admin Writer', 'writer1', 'adminwriter@gmail.com', '$2y$10$dboFKlJ3xDxd8W1MIsykz.ulpUGPMt78XNj6VLQyXF1B0hyGKJXsi', NULL, NULL, '2020-08-28 23:04:39', '2020-09-03 08:43:11', NULL, 'upload/instructors/avatar/70887935_468320187097119_5797944286091673600_n.jpg', NULL, 'HUS'),
(4, 'Admin Writer 2', 'writer2', NULL, '$2y$10$LOOn5Vo9vZ8W0OF60fKNRejfR9e0/05WSXLdpxKvUgeFHdXR/pn16', NULL, NULL, '2020-08-28 23:05:32', '2020-08-28 23:05:32', NULL, 'upload/users/avatar/default.png', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usertocourse`
--
ALTER TABLE `usertocourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usertocourse`
--
ALTER TABLE `usertocourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
