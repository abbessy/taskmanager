-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 12:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_invites`
--

CREATE TABLE `agent_invites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Electro', 'sousse', '78451236', '2023-08-25 17:18:17', '2023-08-25 17:18:17'),
(3, 'company 3', 'kef', '77441122', '2023-08-29 17:12:00', '2023-08-29 17:12:00'),
(4, 'nouv company', 'sfax', '55221144', '2023-09-02 12:14:47', '2023-09-02 12:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invites`
--

CREATE TABLE `invites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_08_15_170909_create_invites_table', 1),
(7, '2023_08_17_164308_create_companies_table', 1),
(8, '2023_08_20_121740_create_responsable_invites_table', 1),
(9, '2023_08_22_135021_create_agent_invites_table', 1),
(24, '2023_08_22_165956_create_tasks_table', 2);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `responsable_invites`
--

CREATE TABLE `responsable_invites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creation_time` date DEFAULT NULL,
  `limit_time` date DEFAULT NULL,
  `responsable_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `comment`, `status`, `creation_time`, `limit_time`, `responsable_id`, `agent_id`, `created_at`, `updated_at`) VALUES
(1, 'Pariatur saepe.', 'Inventore voluptatem laborum sunt iure.', 'Aut adipisci enim non amet officiis maiores. Illo repellendus odit non similique doloribus exxxx.', 'in problem', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:39', '2023-09-11 14:55:30'),
(2, 'Accusamus et.', 'Voluptatibus modi beatae maiores amet.', 'Quam quia dicta voluptatem sed aliquid exercitationem voluptate. Itaque est omnis qui consectetur.', 'to do', '2023-09-09', '2023-10-10', '3', '9', '2023-09-09 12:09:39', '2023-09-11 14:24:35'),
(3, 'Aspernatur ab.', 'Deleniti voluptatem occaecati eius est voluptas.', 'Voluptatum dolores dolores ut qui et. Exercitationem ex ut nobis reiciendis quia id.', 'in problem', '2023-09-09', '2023-10-10', '8', '9', '2023-09-09 12:09:39', '2023-09-09 12:09:39'),
(4, 'Qui molestias.', 'Laboriosam non occaecati deserunt id rerum totam.', 'Sed quia itaque facere repellat. Molestiae asperiores omnis recusandae.', 'in problem', '2023-09-09', '2023-10-10', '8', '9', '2023-09-09 12:09:39', '2023-09-09 12:09:39'),
(5, 'Rerum amet.', 'Sit dicta eum unde sapiente et.', 'Aut rerum sint perspiciatis non. Ad ea est non quam eos. Modi sit rerum voluptates eum.', 'in problem', '2023-09-09', '2023-10-10', '3', '9', '2023-09-09 12:09:39', '2023-09-09 12:09:39'),
(6, 'Sed voluptatem.', 'Rerum accusantium fugit eveniet qui.', 'htrh,trkhjtrkjk jkhtrjhktrtrhttrh tr', 'in problem', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:39', '2023-09-14 10:15:10'),
(7, 'Reprehenderit.', 'Officia blanditiis enim ea recusandae.', 'Repellat aut reiciendis quis et. Praesentium dolor fugiat enim et voluptate hic.', 'in problem', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:39', '2023-09-09 12:09:39'),
(8, 'Sit dolores.', 'Aut ea adipisci in nobis est minus soluta.', 'Officiis suscipit commodi dolorum quas. Voluptatem labore enim eum corporis.', 'to do', '2023-09-09', '2023-10-10', '3', '5', '2023-09-09 12:09:39', '2023-09-09 12:09:39'),
(9, 'Aperiam non.', 'Vero qui culpa ut dolorem.', 'Aspernatur ratione ad laboriosam dicta quo explicabo. Soluta architecto quia aliquam ab.', 'in progress', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:39', '2023-09-09 12:09:39'),
(10, 'Nesciunt ad.', 'Consequatur tenetur est magnam fugit.', 'Odit possimus sed itaque inventore. Odit voluptas illo consequatur similique dolor quas.', 'finished', '2023-09-09', '2023-10-10', '8', '9', '2023-09-09 12:09:39', '2023-09-09 12:09:39'),
(11, 'Itaque quia.', 'Nihil reiciendis odio et.', 'Aut dicta accusamus perferendis nulla. Sit qui iure incidunt. Aperiam qui rerum dolorem omnis.', 'to do', '2023-09-09', '2023-10-10', '3', '5', '2023-09-09 12:09:39', '2023-09-09 12:09:39'),
(12, 'Eaque dolores.', 'Repellat at dignissimos non aut.', 'Quis ullam suscipit omnis et numquam dicta. Non non qui tempore molestiae.', 'finished', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:39', '2023-09-09 12:09:39'),
(13, 'Ipsa et.', 'Nulla qui quasi qui qui rerum aut.', 'Ipsam culpa dolore ratione qui quia. Error magnam quos id iusto.', 'in problem', '2023-09-09', '2023-10-10', '3', '9', '2023-09-09 12:09:39', '2023-09-09 12:09:39'),
(14, 'Voluptatem.', 'Nisi odio soluta repellendus architecto.', 'Ea fuga est non odit. Quibusdam natus nihil perferendis blanditiis harum vitae voluptas.', 'to do', '2023-09-09', '2023-10-10', '3', '5', '2023-09-09 12:09:39', '2023-09-09 12:09:39'),
(15, 'Delectus.', 'Ut non beatae quo.', 'Velit quis ut aut vero deserunt quidem dolor. Veniam numquam cumque voluptatibus qui.', 'in problem', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:39', '2023-09-09 12:09:39'),
(16, 'Cumque.', 'Rem repellat id veritatis molestiae.', 'Sunt nihil porro ea dolorem est modi quo. Aut odio quia error qui. Ab aliquam velit reiciendis.', 'to do', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(17, 'Soluta facilis.', 'Autem voluptate perferendis ipsam ad.', 'In pariatur esse eaque culpa. Molestias dolor dolor itaque eaque deleniti doloremque.', 'finished', '2023-09-09', '2023-10-10', '8', '9', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(18, 'Laborum neque.', 'Vero est ut qui enim nemo et consequatur.', 'Doloremque exercitationem et est debitis consequuntur in. Aut debitis ut sapiente.', 'finished', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(19, 'Quo recusandae.', 'Eum exercitationem aut sunt eos fugit iure.', 'Sunt sunt ut quae id. Autem aut molestiae quod. Unde et nihil nihil qui voluptatem non.', 'in problem', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(20, 'Voluptate.', 'Modi voluptatem rem ipsum hic amet eos vitae.', 'Quis iusto vitae facere voluptas. Qui ea quam earum dolores aut corporis.', 'in progress', '2023-09-09', '2023-10-10', '3', '9', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(21, 'Et est.', 'Aut facere enim quae.', 'Et ipsum cumque sit aperiam in eos autem. Numquam amet facilis aut magni ut omnis aut quia.', 'in problem', '2023-09-09', '2023-10-10', '3', '9', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(22, 'Ratione.', 'Itaque soluta id culpa rerum.', 'Hic minus omnis ex voluptas. Error officiis similique et. Harum et non id laboriosam.', 'finished', '2023-09-09', '2023-10-10', '3', '4', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(23, 'Eaque.', 'Est rem aut labore repudiandae voluptate fugit.', 'Nostrum quae ipsam tempora hic animi. Porro est quia maxime inventore.', 'finished', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(24, 'At dolore.', 'Quam placeat neque non soluta repudiandae.', 'Et explicabo odit quae asperiores quis accusamus. Aut reiciendis voluptas accusamus et est velit.', 'finished', '2023-09-09', '2023-10-10', '8', '9', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(25, 'Rem ut esse.', 'Corporis distinctio aliquam eligendi quod est.', 'Impedit ut aut aperiam vel. Dolore vel autem et sint. Labore dicta illo nesciunt nam.', 'finished', '2023-09-09', '2023-10-10', '3', '4', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(26, 'Eveniet itaque.', 'Autem est eos est amet quam.', 'Aut quia nostrum ut ad rerum numquam. Dolor similique numquam fuga et ipsa ut ipsam.', 'to do', '2023-09-09', '2023-10-10', '8', '9', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(27, 'Mollitia hic.', 'Enim ad omnis doloremque vel et.', 'Est rem corporis impedit ut. Laboriosam consequatur ullam quia sed molestias reprehenderit.', 'in problem', '2023-09-09', '2023-10-10', '3', '4', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(28, 'Ratione.', 'Voluptatem deleniti sed minus labore atque nobis.', 'Natus perspiciatis et error in quidem ut. Voluptas saepe nisi expedita illum.', 'finished', '2023-09-09', '2023-10-10', '8', '9', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(29, 'Dolores.', 'Dolorem dignissimos aperiam sit suscipit.', 'Tenetur eos ipsa repudiandae veniam qui earum at. Ut et qui a occaecati hic adipisci.', 'in progress', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(30, 'Cumque eos eum.', 'Repellendus omnis non quasi ab eius magnam odio.', 'Non commodi consectetur id dicta id. Necessitatibus aut totam reiciendis.', 'finished', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(31, 'Est animi.', 'Enim eum consectetur ut ut assumenda.', 'Et voluptatem dolores quo odio. Quasi sequi aperiam voluptate eos dicta.', 'in problem', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(32, 'Modi aut quia.', 'Voluptas ea nobis aut in voluptate doloribus.', 'A qui quos qui excepturi. Qui mollitia aut quas esse ut neque quisquam.', 'to do', '2023-09-09', '2023-10-10', '8', '9', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(33, 'Et beatae non.', 'Et omnis dolores atque neque.', 'Qui nesciunt voluptatibus et. Cupiditate deleniti sed quas culpa sit.', 'finished', '2023-09-09', '2023-10-10', '3', '9', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(34, 'Qui sit magnam.', 'Ipsum quas aperiam qui et sit dolorum earum.', 'Mollitia rem totam accusamus praesentium et nisi. Sit dignissimos ex ipsum qui.', 'finished', '2023-09-09', '2023-10-10', '3', '9', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(35, 'Quod provident.', 'Est vel tenetur sit facilis aut iure.', 'Quos natus mollitia eius. Et praesentium expedita sed voluptatum sequi ut. Rerum soluta ut ut.', 'in problem', '2023-09-09', '2023-10-10', '8', '9', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(36, 'Corrupti.', 'Qui earum qui qui.', 'Commodi omnis magni consequatur libero. Commodi qui veniam voluptate ex quia id veniam.', 'finished', '2023-09-09', '2023-10-10', '3', '4', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(37, 'Voluptas.', 'Quasi voluptatem velit quis qui in omnis.', 'Omnis reprehenderit veritatis eveniet eius aut quia aut. Dolor fugit sequi natus aliquid hic.', 'to do', '2023-09-09', '2023-10-10', '3', '9', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(38, 'Explicabo est.', 'Quo dolor iure et qui voluptatem doloribus.', 'Architecto et nam libero vitae et. Est maxime consectetur minima voluptas optio iste.', 'to do', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(39, 'Consequatur.', 'Animi qui deserunt aut in qui.', 'Dolorem ut qui rerum harum. Labore sunt quo nemo eligendi qui dignissimos alias vel.', 'in problem', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:40', '2023-09-09 12:09:40'),
(40, 'Iusto est eos.', 'Officia sed voluptatum natus voluptatem.', 'Nihil velit a est laudantium. Veritatis fugiat inventore aut cum. Quos repellendus eos totam.', 'in problem', '2023-09-09', '2023-10-10', '3', '5', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(41, 'Ut aliquid.', 'Ipsa voluptatum dicta ipsam natus dolorem.', 'Quia accusantium odio fugiat aut. Porro quia est aut. Temporibus excepturi iste ut quaerat ad in.', 'in progress', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(42, 'Accusamus.', 'Aut est vel quis ad officiis beatae.', 'Consectetur quia quia voluptas vel suscipit sapiente. Quia molestiae officiis rem placeat sunt.', 'in problem', '2023-09-09', '2023-10-10', '8', '9', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(43, 'Cupiditate.', 'Magni quis dolorem eius iure sint expedita vitae.', 'Voluptate incidunt rerum sed. Amet quas natus atque. Voluptate voluptatum non corrupti vel commodi.', 'to do', '2023-09-09', '2023-10-10', '3', '9', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(44, 'Enim nihil.', 'Dolore ut pariatur voluptatem molestias ad vel.', 'Qui vel maxime nostrum esse placeat illo. Hic expedita ea sit. Veritatis ab dicta non cupiditate.', 'in problem', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(45, 'Consectetur.', 'Et architecto quidem aut blanditiis.', 'Autem aliquam et hic ad nisi et beatae. Vel mollitia sunt harum occaecati. Qui et sed ut sit.', 'in problem', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(46, 'Omnis minima.', 'Autem ea rerum consequatur et excepturi.', 'Beatae odio vitae sit ducimus nisi sequi. Eum odio corporis fugiat et eum quidem nam rem.', 'in problem', '2023-09-09', '2023-10-10', '3', '5', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(47, 'Et rem officia.', 'Autem minima molestiae quos placeat hic sed.', 'Architecto tempora dicta officia ea in et doloremque. Perferendis totam ratione reiciendis.', 'to do', '2023-09-09', '2023-10-10', '3', '5', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(48, 'Reprehenderit.', 'Quis id consequatur sed nesciunt.', 'Quo ex tempore ipsa et. Sunt quo aut aut praesentium quis sunt.', 'exceeded', '2023-09-09', '2023-09-08', '3', '4', '2023-09-09 12:09:41', '2023-09-09 12:12:30'),
(49, 'Voluptatem ex.', 'Repellat sed sed totam error.', 'Sint officia quia ut eos. Aut soluta omnis beatae doloribus recusandae magnam sequi omnis.', 'in problem', '2023-09-09', '2023-10-10', '3', '5', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(50, 'Hic eum nulla.', 'Nihil quibusdam aliquam iure.', 'Fugit qui omnis vel ut. Qui pariatur voluptate illum ipsam quisquam omnis sapiente.', 'to do', '2023-09-09', '2023-10-10', '3', '9', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(51, 'Tempore.', 'Et pariatur hic aut neque corrupti harum sit.', 'Quibusdam unde dolorum et quasi omnis dolorum. Dolores blanditiis doloremque impedit.', 'in progress', '2023-09-09', '2023-10-10', '3', '5', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(52, 'Eum enim.', 'Nisi ea corporis dicta aliquam quam sit.', 'Ipsam a ut est aut. Provident animi magni quis est cum eius.', 'finished', '2023-09-09', '2023-10-10', '3', '4', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(53, 'Eos voluptas.', 'Delectus consectetur dolores fugiat.', 'Nihil a deserunt qui delectus iusto nostrum. Corrupti sint soluta ea quod.', 'finished', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(54, 'Architecto.', 'Est expedita qui minus.', 'Quia odio laborum et facere et voluptatem. Nostrum vel voluptatem omnis veritatis.', 'to do', '2023-09-09', '2023-10-10', '3', '4', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(55, 'Amet corrupti.', 'Qui doloribus ad iusto reiciendis et ea aut.', 'Molestiae sint veritatis ducimus nobis fugiat. Voluptatibus ut cum eos eveniet aut est ut.', 'finished', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(56, 'Modi hic.', 'Vero beatae est adipisci omnis hic eius.', 'Quas beatae voluptas commodi qui id. Nobis explicabo rem fugiat rerum quia.', 'finished', '2023-09-09', '2023-09-08', '3', '4', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(57, 'Sed suscipit.', 'Rerum qui dolores ratione.', 'Velit voluptate et maiores voluptas. Minima dolorem illum molestias consequatur.', 'exceeded', '2023-09-09', '2023-09-08', '8', '4', '2023-09-09 12:09:41', '2023-09-09 12:12:30'),
(58, 'Eum iste totam.', 'Voluptatum commodi in deleniti mollitia qui.', 'Cumque odit quis expedita et nulla id ab. Non ea fugit architecto unde aut rerum.', 'in progress', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(59, 'Nostrum aut.', 'Dignissimos molestiae esse qui.', 'Aliquid ea autem natus omnis quasi reiciendis. Ut ut quia saepe iure.', 'in problem', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(60, 'Omnis ab rerum.', 'Repudiandae esse iusto nesciunt est.', 'Id quae quia dolorem quia. Qui quo beatae sit non ut voluptatum quos qui.', 'exceeded', '2023-09-09', '2023-09-08', '3', '5', '2023-09-09 12:09:41', '2023-09-09 12:12:30'),
(61, 'Minus rerum.', 'Qui consectetur sunt molestias odio minus.', 'Vel tempora voluptatem cumque esse dolorem. Qui pariatur eos omnis nisi nostrum molestiae.', 'finished', '2023-09-09', '2023-10-10', '3', '9', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(62, 'Corporis nam.', 'Vel voluptatum alias et quae.', 'Laudantium natus totam iure et. Reprehenderit veritatis dolorum sed sint sequi.', 'to do', '2023-09-09', '2023-10-10', '8', '9', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(63, 'Eos.', 'Et ut dolorum tempore et.', 'Assumenda aliquam aut provident est. Excepturi rerum nobis inventore autem molestias.', 'finished', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(64, 'Suscipit.', 'Quo et placeat qui quas suscipit autem deserunt.', 'Aut odio id nobis fuga ut. Aut ullam est quam sunt vero.', 'to do', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(65, 'Doloremque.', 'Aspernatur error et saepe et est vel ipsa.', 'Ut ut dolor vel illum. Doloribus ut aut vel placeat numquam quas consequuntur. Sed ut sed rerum.', 'in progress', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(66, 'Totam.', 'Non quis quae voluptate explicabo.', 'Autem itaque consectetur ut qui ullam. Adipisci omnis maxime minima maxime voluptatibus reiciendis.', 'in progress', '2023-09-09', '2023-10-10', '3', '5', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(67, 'Explicabo et.', 'Est est dicta omnis.', 'Maxime impedit est sint unde. Saepe maiores ea voluptatem delectus necessitatibus quibusdam et.', 'in progress', '2023-09-09', '2023-10-10', '3', '9', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(68, 'Id est quia.', 'Sequi distinctio natus numquam optio.', 'Iusto qui quo libero commodi. Commodi quo neque est quia et. Aut unde omnis deleniti.', 'finished', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(69, 'Ea cupiditate.', 'Consequatur commodi dolor totam et.', 'Accusantium voluptatem totam dolores tempora. Dolorem soluta dolorum temporibus.', 'finished', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(70, 'Et repudiandae.', 'Sed eos rerum et temporibus esse.', 'Sit id blanditiis ea in. Qui a occaecati omnis doloremque quia.', 'in problem', '2023-09-09', '2023-10-10', '3', '9', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(71, 'Amet dicta.', 'Aspernatur minima omnis odio quia sequi aperiam.', 'Similique amet delectus sint tenetur. Error sit et repudiandae fuga ut aspernatur perferendis.', 'finished', '2023-09-09', '2023-09-08', '3', '5', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(72, 'Sit nobis hic.', 'Voluptas maxime quisquam eveniet repellat sed.', 'Id natus fugit autem. Est laudantium aliquid cum ullam voluptates nulla et sunt.', 'to do', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(73, 'Qui atque.', 'Ut dolore enim dicta incidunt.', 'Tempore autem autem explicabo praesentium quis impedit quis. Commodi quia libero non.', 'exceeded', '2023-09-09', '2023-09-08', '3', '4', '2023-09-09 12:09:41', '2023-09-09 12:12:30'),
(74, 'Repellat.', 'Fugit deleniti non beatae repellendus.', 'Voluptatem molestiae quis eos. Nemo quo facilis eaque et porro voluptatum quis.', 'in problem', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(75, 'Ab.', 'Cumque dignissimos eius tempora et quos alias.', 'Commodi necessitatibus voluptatem recusandae voluptas. Cumque vitae dolorum odit.', 'in progress', '2023-09-09', '2023-10-10', '3', '5', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(76, 'Dolores.', 'Quia nisi dolor qui ipsum.', 'Consectetur repellat qui voluptas. Amet dicta iusto modi maiores quo vitae soluta commodi.', 'to do', '2023-09-09', '2023-10-10', '3', '4', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(77, 'Ab quia.', 'Ducimus dicta iste sapiente nihil.', 'Corrupti fugiat alias ut. Eveniet repudiandae eum rerum odio quaerat nemo fugiat.', 'in progress', '2023-09-09', '2023-10-10', '8', '9', '2023-09-09 12:09:41', '2023-09-09 12:09:41'),
(78, 'Vero aut eius.', 'Modi qui aut cumque rerum.', 'Omnis molestiae qui quo. Veritatis voluptas iure a est quo fuga voluptatibus.', 'finished', '2023-09-09', '2023-10-10', '3', '5', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(79, 'Rerum sed.', 'Non atque et id architecto.', 'Rem rem aliquid doloremque necessitatibus. Dolor rerum saepe qui animi dolorem nam.', 'in progress', '2023-09-09', '2023-10-10', '3', '4', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(80, 'Ex et est.', 'Qui eos nulla at dolor velit quia aut.', 'Fugit omnis corrupti eveniet aut aperiam ut. Et est id id. Non voluptas cumque id aliquam.', 'in problem', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(81, 'Sit quam quis.', 'Occaecati culpa aut placeat voluptatem aliquam.', 'Sequi in qui aut incidunt. Aliquam vel perferendis rerum. Vel labore placeat est.', 'in problem', '2023-09-09', '2023-10-10', '8', '9', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(82, 'Eligendi nulla.', 'Et et neque voluptatem consequatur voluptas.', 'Rem in magnam quibusdam quas repudiandae. Amet est expedita voluptate nostrum cum.', 'in progress', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(83, 'Sit eos.', 'Cumque cumque eius a nostrum sint.', 'Quisquam quia aut qui eveniet magnam vitae dignissimos. Libero eos aut dignissimos quae quisquam.', 'in problem', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(84, 'Sit dolorem.', 'Soluta tempore rerum maxime aspernatur earum.', 'Natus et et cupiditate nihil molestiae. Dignissimos eligendi quaerat perspiciatis ut.', 'in problem', '2023-09-09', '2023-10-10', '3', '9', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(85, 'Repellendus et.', 'Ab optio dolorum est qui iusto totam dolore.', 'Voluptatem labore fuga sit commodi ut. Architecto modi eum quae vel. Eum dolores ut odit quod.', 'in progress', '2023-09-09', '2023-10-10', '3', '4', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(86, 'Voluptatem ad.', 'Atque officia deserunt explicabo sunt nulla nisi.', 'Sed quae saepe esse tenetur. Voluptas dolor enim perferendis ratione nisi tempore repudiandae.', 'in problem', '2023-09-09', '2023-10-10', '3', '9', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(87, 'Amet unde.', 'Iusto itaque ab laboriosam facere et dolores.', 'Ut voluptatem fugit et. Molestiae rem possimus placeat veniam dolor voluptatem nihil.', 'in progress', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(88, 'Esse nihil.', 'Esse vel temporibus nesciunt minima corrupti.', 'Quo eveniet tenetur eum. Non nobis eum ut nobis.', 'in progress', '2023-09-09', '2023-10-10', '3', '9', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(89, 'Delectus modi.', 'Architecto laborum ad sequi.', 'Quo nostrum saepe aliquam magnam eligendi in. Consequuntur pariatur et in itaque.', 'exceeded', '2023-09-09', '2023-09-08', '3', '4', '2023-09-09 12:09:42', '2023-09-09 12:12:30'),
(90, 'Nihil.', 'Quis deleniti minima debitis quos omnis natus.', 'Adipisci rem et tempore sunt sit laboriosam recusandae maiores. A non in est consequatur autem quo.', 'to do', '2023-09-09', '2023-10-10', '3', '4', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(91, 'Quia quod aut.', 'Architecto aut et hic aut sed.', 'Asperiores quod quo dolores qui aliquid commodi aut. Et qui dolor quo rerum dicta molestias ea.', 'in progress', '2023-09-09', '2023-10-10', '8', '9', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(92, 'Iste dolores.', 'Autem repudiandae dolorem aut et eum atque et.', 'Omnis eos distinctio natus quo. Ipsa quod odit ab voluptas et.', 'finished', '2023-09-09', '2023-10-10', '8', '9', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(93, 'Praesentium.', 'Quam sed eos aut excepturi.', 'Quae corporis asperiores alias ea esse. Sit itaque non dolorem itaque perferendis.', 'to do', '2023-09-09', '2023-10-10', '3', '5', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(94, 'Autem.', 'Voluptas dolor illum et asperiores neque ab est.', 'Temporibus voluptatum fugiat omnis aut repellat quod. Autem alias eveniet qui natus a.', 'to do', '2023-09-09', '2023-10-10', '8', '9', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(95, 'Nisi soluta.', 'Et rerum ut dolore nostrum nihil possimus.', 'Vitae consequatur facere natus eligendi ut et. Enim dolores et aspernatur voluptas molestiae dolor.', 'in progress', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(96, 'Non nesciunt.', 'Quaerat animi repudiandae qui nulla modi.', 'Et ut facilis eum quos vel sed perspiciatis ut. Aut enim perspiciatis perspiciatis aut nisi cumque.', 'to do', '2023-09-09', '2023-10-10', '8', '4', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(97, 'Eum.', 'Debitis quibusdam accusantium sed debitis beatae.', 'Voluptate atque id enim provident atque. Exercitationem dolores ad necessitatibus et.', 'in progress', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(98, 'Voluptatibus.', 'Quas vel autem vel rem odio.', 'Mollitia aut dolorem commodi autem. Perferendis dolores magnam quaerat doloribus repellat enim.', 'to do', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:42', '2023-09-09 12:09:42'),
(99, 'Aut vel culpa.', 'Quaerat perferendis ducimus ullam ullam.', 'Rerum est numquam voluptas nulla quasi. Vel et ut quo quae nisi voluptates.', 'exceeded', '2023-09-09', '2023-09-08', '8', '5', '2023-09-09 12:09:42', '2023-09-09 12:12:30'),
(100, 'Voluptatibus.', 'Mollitia atque voluptas et non totam.', 'Quo eaque omnis sed autem optio. Sit id fugiat repudiandae vel.', 'in progress', '2023-09-09', '2023-10-10', '8', '5', '2023-09-09 12:09:42', '2023-09-09 12:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsable_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_type`, `company_id`, `client_id`, `responsable_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Silas Hansen Jr.', 'admin', NULL, NULL, NULL, 'marta10@example.net', '2023-09-09 11:48:58', '$2y$10$UaKDuGt25ok1qkYK1/9be.BFRCkkfazwQzgTMMQj0t2tOOBFvwMwe', NULL, '2023-09-09 11:48:58', '2023-09-09 11:48:58'),
(2, 'Cathy Sporer', 'client', '1', NULL, NULL, 'onie55@example.net', '2023-09-09 11:55:39', '$2y$10$5sZkGZyQN5yEO5aql3Xsa.w9hE9IP7l5Ax7Mnlkc/TqGxIwU7m6P2', NULL, '2023-09-09 11:55:39', '2023-09-11 13:17:17'),
(3, 'Alda Weissnat', 'responsable', NULL, '2', NULL, 'friesen.lance@example.net', '2023-09-09 11:55:39', '$2y$10$/PlfEl/cVj90hFSRiGKKOOXv0KN91TNUOcRNZmspbgFj2o0xQ92oi', NULL, '2023-09-09 11:55:39', '2023-09-09 11:55:39'),
(4, 'Wyatt Tromp', 'agent', NULL, NULL, '3', 'qglover@example.com', '2023-09-09 11:55:39', '$2y$10$/v01ZmKcd.Wu62An5xVF9OT9xCXEvrRXT2.0Xr40KXJSyzfULbeTe', NULL, '2023-09-09 11:55:39', '2023-09-09 11:55:39'),
(5, 'Kayley Waelchi', 'agent', NULL, NULL, '3', 'ana.kuhic@example.com', '2023-09-09 11:55:39', '$2y$10$jO0rvkmxDIGvgX51WVirD.2p/FSKuKcurx8bpKfutipcHlRNXou1a', NULL, '2023-09-09 11:55:39', '2023-09-09 11:55:39'),
(6, 'Thurman Abbott', 'client', '2', NULL, NULL, 'okreiger@example.org', '2023-09-09 11:55:39', '$2y$10$4JARq8trm/.5gFm/yJNvwuJL5bYV86mneoCOVdbtkIRaoRVgLxOra', NULL, '2023-09-09 11:55:39', '2023-09-09 11:55:39'),
(7, 'Miss Leann Conroy I', 'responsable', NULL, '2', NULL, 'jazmyn.cormier@example.org', '2023-09-09 11:55:39', '$2y$10$ZtPU250AQcl04IxocCBExuYXysfAiHyKEy984SOyErs/g3Xty4o5y', NULL, '2023-09-09 11:55:39', '2023-09-09 11:55:39'),
(8, 'Aileen Christiansen', 'responsable', NULL, '2', NULL, 'jenifer.volkman@example.org', '2023-09-09 11:55:39', '$2y$10$zggX5F2SML6Noouqwnl1tepqF9ldVXJOiABcYHuZ5CErkbhnOHmq6', NULL, '2023-09-09 11:55:39', '2023-09-09 11:55:39'),
(9, 'Rollin Yundt', 'agent', NULL, NULL, '3', 'lebsack.evans@example.net', '2023-09-09 11:55:39', '$2y$10$SpZUX/tCGA5zp2l0ziFvPeYFSwpsbzh9w13AhPb1d6wXaghG8CiAO', NULL, '2023-09-09 11:55:39', '2023-09-09 11:55:39'),
(11, 'Bradford Strosin I', 'responsable', NULL, '2', NULL, 'jayden.glover@example.net', '2023-09-09 11:55:39', '$2y$10$SGOom1k.tkzhtQy0t4F/r.MkEUcPYD4t1IYZY6IAtclBMPwNzS7qW', NULL, '2023-09-09 11:55:39', '2023-09-09 11:55:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent_invites`
--
ALTER TABLE `agent_invites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agent_invites_email_unique` (`email`),
  ADD UNIQUE KEY `agent_invites_token_unique` (`token`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invites`
--
ALTER TABLE `invites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invites_email_unique` (`email`),
  ADD UNIQUE KEY `invites_token_unique` (`token`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `responsable_invites`
--
ALTER TABLE `responsable_invites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `responsable_invites_email_unique` (`email`),
  ADD UNIQUE KEY `responsable_invites_token_unique` (`token`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent_invites`
--
ALTER TABLE `agent_invites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invites`
--
ALTER TABLE `invites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `responsable_invites`
--
ALTER TABLE `responsable_invites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
