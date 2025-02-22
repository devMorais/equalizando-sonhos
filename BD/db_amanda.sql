-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/02/2025 às 00:02
-- Versão do servidor: 8.0.41
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_amanda`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `about_configs`
--

CREATE TABLE `about_configs` (
  `id` bigint UNSIGNED NOT NULL,
  `is_disabled` tinyint(1) DEFAULT '0',
  `title` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `about_configs`
--

INSERT INTO `about_configs` (`id`, `is_disabled`, `title`, `description`, `button_text`, `button_url`, `created_at`, `updated_at`) VALUES
(1, 0, 'Voluptatem dignissimos provident quasi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit', 'Conheça Minha História', '#', '2025-02-09 02:42:50', '2025-02-13 02:10:46');

-- --------------------------------------------------------

--
-- Estrutura para tabela `about_itens`
--

CREATE TABLE `about_itens` (
  `id` bigint UNSIGNED NOT NULL,
  `is_disabled` tinyint(1) DEFAULT '0',
  `url` text COLLATE utf8mb4_unicode_ci,
  `icon` text COLLATE utf8mb4_unicode_ci,
  `title` text COLLATE utf8mb4_unicode_ci,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `about_itens`
--

INSERT INTO `about_itens` (`id`, `is_disabled`, `url`, `icon`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 'http://127.0.0.1:8000/admin/about-itens/2/edit', 'fas fa-building', 'TESTE', 'TESTETESTETESTETESTETESTETESTETESTETESTETESTE', '2025-02-09 04:48:12', '2025-02-09 13:29:50'),
(2, 0, 'http://127.0.0.1:8000/admin/about-itens/2/edit', 'fas fa-archway', 'TESTE 2', 'TESTE 2TESTE 2TESTE 2TESTE 2TESTE 2TESTE 2TESTE 2TESTE 2TESTE 2TESTE 2TESTE 2TESTE 2', '2025-02-09 05:17:19', '2025-02-09 13:14:09'),
(6, 0, 'http://127.0.0.1:8000/admin/about-itens/6/edit', 'fas fa-audio-description', 'TESTE', 'TESTETESTETESTETESTETESTETESTE', '2025-02-09 06:04:10', '2025-02-09 13:14:00'),
(8, 0, 'https://www.wenelegabedehi.mobi', 'fas fa-bell', 'Aspernatur sed bland', 'Iste ipsa qui dolor', '2025-02-09 06:19:33', '2025-02-09 14:04:51');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `is_disabled` tinyint(1) DEFAULT '0',
  `logo` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `clients`
--

INSERT INTO `clients` (`id`, `is_disabled`, `logo`, `name`, `website_url`, `created_at`, `updated_at`) VALUES
(20, 1, 'uploads/776237614_logo.png', 'Equalizando Sonhos', 'https://equalizandosonhos.com.br/', '2025-02-09 01:30:59', '2025-02-10 02:31:26'),
(23, 0, 'uploads/778639355_logo.png', 'Amanda', 'https://equalizandosonhos.com.br/', '2025-02-13 02:08:15', '2025-02-13 02:08:15'),
(24, 0, 'uploads/350451428_logo.png', 'Amanda', 'https://equalizandosonhos.com.br/', '2025-02-13 02:08:27', '2025-02-13 02:08:27'),
(25, 0, 'uploads/315099050_logo.png', 'Amanda', 'https://equalizandosonhos.com.br/', '2025-02-13 02:08:37', '2025-02-13 02:08:37'),
(26, 0, 'uploads/1458882499_logo.png', 'Amanda', 'https://equalizandosonhos.com.br/', '2025-02-13 02:08:49', '2025-02-13 02:08:49');

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `heroes`
--

CREATE TABLE `heroes` (
  `id` bigint UNSIGNED NOT NULL,
  `is_disabled` tinyint(1) NOT NULL DEFAULT '0',
  `background_image` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `heroes`
--

INSERT INTO `heroes` (`id`, `is_disabled`, `background_image`, `title`, `description`, `button_text`, `button_url`, `video_url`, `created_at`, `updated_at`) VALUES
(1, 0, 'uploads/812993633_login-bg.jpg', 'Bettter digital experience with Presento', 'We are team of talented designers making websites with Bootstrap', 'Saiba Mais', '#', 'https://www.youtube.com/watch?v=68EYCgIae2w&t=29s', '2025-02-02 04:35:05', '2025-02-13 02:07:45');

-- --------------------------------------------------------

--
-- Estrutura para tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_02_01_223154_create_heroes_table', 2),
(5, '2025_02_02_171749_create_clients_table', 3),
(6, '2025_02_08_150301_create_abouts_table', 4),
(7, '2025_02_08_225007_create_about_configs_table', 5),
(8, '2025_02_09_002902_create_about_itens_table', 6),
(9, '2025_02_09_114450_create_stats_table', 7),
(10, '2025_02_10_221238_create_tab_categories_table', 8),
(11, '2025_02_16_120112_create_tab_items_table', 9),
(12, '2025_02_17_201056_create_services_table', 10),
(13, '2025_02_19_203606_create_service_items_table', 11),
(14, '2025_02_20_211917_create_portfolio_categories_table', 12),
(15, '2025_02_21_233909_create_portfolio_items_table', 13),
(16, '2025_02_22_013936_create_portfolio_configs_table', 14);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `portfolio_categories`
--

CREATE TABLE `portfolio_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `portfolio_categories`
--

INSERT INTO `portfolio_categories` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Omnis Nam nostrud pe', 'omnis-nam-nostrud-pe-p1R9d', '2025-02-21 01:12:53', '2025-02-21 01:13:11'),
(3, 'Laborum aspernatur q', 'laborum-aspernatur-q-EjKTj', '2025-02-21 01:12:58', '2025-02-21 01:13:05'),
(4, 'Dolor sapiente eiusm', 'dolor-sapiente-eiusm-zYtdf', '2025-02-21 01:13:15', '2025-02-21 01:13:15'),
(5, 'Sunt neque sit aut', 'sunt-neque-sit-aut-uK2UZ', '2025-02-21 01:13:21', '2025-02-21 01:13:21'),
(8, 'Aute dolore dolores', 'aute-dolore-dolores-XPG9Q', '2025-02-21 01:54:30', '2025-02-21 01:54:30'),
(9, 'Maiores veniam ut e', 'maiores-veniam-ut-e-e7la5', '2025-02-21 01:54:47', '2025-02-21 01:54:47');

-- --------------------------------------------------------

--
-- Estrutura para tabela `portfolio_configs`
--

CREATE TABLE `portfolio_configs` (
  `id` bigint UNSIGNED NOT NULL,
  `is_disabled` tinyint(1) DEFAULT '0',
  `title` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `portfolio_configs`
--

INSERT INTO `portfolio_configs` (`id`, `is_disabled`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ut adipisci commodi', 'Impedit corporis am', '2025-02-22 04:58:21', '2025-02-22 05:01:02');

-- --------------------------------------------------------

--
-- Estrutura para tabela `portfolio_items`
--

CREATE TABLE `portfolio_items` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `portfolio_items`
--

INSERT INTO `portfolio_items` (`id`, `title`, `description`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Dolor consequat Mol', 'Et commodo velit, po. Et commodo velit, po.Et commodo velit, po.Et commodo velit, po.Et commodo velit, po.Et commodo velit, po.Et commodo velit, po.', 'uploads/845068954_client-2.png', 8, '2025-02-22 03:41:58', '2025-02-22 03:41:58'),
(2, 'Consectetur qui est', 'Porro natus veniam  Porro natus veniam Porro natus veniam', 'uploads/2006045012_client-8.png', 5, '2025-02-22 04:23:20', '2025-02-22 04:23:20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `is_disabled` tinyint(1) DEFAULT '0',
  `title` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `services`
--

INSERT INTO `services` (`id`, `is_disabled`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 'Este é um teste de título', 'Este é um teste de descrição', '2025-02-17 23:41:31', '2025-02-17 23:51:24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `service_items`
--

CREATE TABLE `service_items` (
  `id` bigint UNSIGNED NOT NULL,
  `is_disabled` tinyint(1) DEFAULT '0',
  `icon` text COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `service_items`
--

INSERT INTO `service_items` (`id`, `is_disabled`, `icon`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 'fas fa-align-center', 'Consequatur et volup', 'Quia ullam nostrud d Quia ullam nostrud dQuia ullam nostrud dQuia ullam nostrud dQuia ullam nostrud dQuia ullam nostrud dQuia ullam nostrud d', '2025-02-20 02:01:58', '2025-02-20 23:30:58'),
(2, 0, 'fas fa-address-card', 'Dolores possimus ac', 'Aut natus eaque ulla Aut natus eaque ullaAut natus eaque ullaAut natus eaque ullaAut natus eaque ullaAut natus eaque ullaAut natus eaque ulla', '2025-02-20 23:24:13', '2025-02-20 23:30:46'),
(3, 0, 'fas fa-arrow-up', 'Ipsum molestiae con', 'Itaque molestias tem Itaque molestias temItaque molestias temItaque molestias temItaque molestias temItaque molestias temItaque molestias tem', '2025-02-20 23:24:21', '2025-02-20 23:30:33'),
(4, 0, 'fas fa-air-freshener', 'Molestiae nisi irure', 'Exercitationem sit Exercitationem sit Exercitationem sit Exercitationem sit Exercitationem sit Exercitationem sit', '2025-02-20 23:24:27', '2025-02-20 23:30:22'),
(5, 0, 'fab fa-accusoft', 'Porro ut explicabo', 'Voluptates eveniet Voluptates eveniet Voluptates eveniet Voluptates eveniet Voluptates eveniet Voluptates eveniet Voluptates eveniet', '2025-02-20 23:24:34', '2025-02-20 23:30:09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('tqgRDhqmZZo29vngtxPhwCoKMA7o7G6m1RHstn1i', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ1JqN3RzRTkzTUhKMmJSZEdjbkZYc3dXRWFLSnF4ZVhYZ1NyVFdWciI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1740200465);

-- --------------------------------------------------------

--
-- Estrutura para tabela `stats`
--

CREATE TABLE `stats` (
  `id` bigint UNSIGNED NOT NULL,
  `is_disabled` tinyint(1) DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `stats`
--

INSERT INTO `stats` (`id`, `is_disabled`, `title`, `icon`, `count`, `created_at`, `updated_at`) VALUES
(3, 0, 'Trabalhadores', 'fas fa-people-carry', 4, '2025-02-10 01:47:11', '2025-02-10 23:59:26'),
(4, 0, 'Horas de Suporte', 'fab fa-angular', 5000, '2025-02-10 01:52:57', '2025-02-10 23:58:34'),
(5, 0, 'Projetos', 'fab fa-r-project', 521, '2025-02-10 01:53:22', '2025-02-10 23:59:34'),
(7, 0, 'Clientes Felizes', 'fas fa-atom', 232, '2025-02-10 01:54:44', '2025-02-10 23:59:38');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_categories`
--

CREATE TABLE `tab_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `is_disabled` tinyint(1) DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tab_categories`
--

INSERT INTO `tab_categories` (`id`, `is_disabled`, `title`, `slug`, `icon`, `created_at`, `updated_at`) VALUES
(1, 0, 'Séries', 'series-k8HIR', 'fas fa-tv', '2025-02-12 23:36:43', '2025-02-16 14:57:09'),
(2, 0, 'Livros', 'livros-t0Tc8', 'fas fa-book-open', '2025-02-12 23:44:26', '2025-02-16 14:57:02'),
(4, 0, 'Sites', 'sites-NHpYI', 'fas fa-sitemap', '2025-02-16 20:02:29', '2025-02-16 20:02:29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tab_items`
--

CREATE TABLE `tab_items` (
  `id` bigint UNSIGNED NOT NULL,
  `is_disabled` tinyint(1) DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tab_items`
--

INSERT INTO `tab_items` (`id`, `is_disabled`, `title`, `image`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 0, 'Necessitatibus exerc', 'uploads/1590093078_services.jpg', 'Pariatur? Voluptas i.&nbsp;Necessitatibus exercNecessitatibus exercNecessitatibus exercNecessitatibus exercNecessitatibus exercNecessitatibus exercNecessitatibus exerc', 4, '2025-02-16 18:07:46', '2025-02-16 20:16:09'),
(3, 0, 'Consectetur id quae', 'uploads/673369445_working-4.jpg', 'Aliqua. Nihil rerum . Aliqua. Nihil rerum .Aliqua. Nihil rerum .Aliqua. Nihil rerum .Aliqua. Nihil rerum .Aliqua. Nihil rerum .Aliqua. Nihil rerum .', 2, '2025-02-16 19:38:05', '2025-02-16 20:14:48'),
(4, 0, 'Facilis do dicta aut', 'uploads/2044758173_working-3.jpg', 'Provident, et qui si. Facilis do dicta autFacilis do dicta autFacilis do dicta autFacilis do dicta autFacilis do dicta autFacilis do dicta autFacilis do dicta autFacilis do dicta aut', 1, '2025-02-16 20:02:52', '2025-02-16 20:16:26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Amanda', 'contato@equalizandosonhos.com.br', NULL, '$2y$12$QqaPHpztW8CkNpmmXiUKpeAAkvqZ/4yDVKLJNSoNR3c99OiZwUdKK', 'NbC3SRrloP0k2whme3QErxBob49NTe5ngWEPHYDrA02EVglwdmgZdYPEZ7ar', '2025-01-27 05:33:06', '2025-02-01 04:46:09');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `about_configs`
--
ALTER TABLE `about_configs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `about_itens`
--
ALTER TABLE `about_itens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Índices de tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Índices de tabela `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices de tabela `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `portfolio_categories_slug_unique` (`slug`);

--
-- Índices de tabela `portfolio_configs`
--
ALTER TABLE `portfolio_configs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `portfolio_items`
--
ALTER TABLE `portfolio_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolio_items_category_id_foreign` (`category_id`);

--
-- Índices de tabela `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `service_items`
--
ALTER TABLE `service_items`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices de tabela `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tab_categories`
--
ALTER TABLE `tab_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tab_categories_slug_unique` (`slug`);

--
-- Índices de tabela `tab_items`
--
ALTER TABLE `tab_items`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `about_configs`
--
ALTER TABLE `about_configs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `about_itens`
--
ALTER TABLE `about_itens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `heroes`
--
ALTER TABLE `heroes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `portfolio_categories`
--
ALTER TABLE `portfolio_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `portfolio_configs`
--
ALTER TABLE `portfolio_configs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `portfolio_items`
--
ALTER TABLE `portfolio_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `service_items`
--
ALTER TABLE `service_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `stats`
--
ALTER TABLE `stats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tab_categories`
--
ALTER TABLE `tab_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tab_items`
--
ALTER TABLE `tab_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `portfolio_items`
--
ALTER TABLE `portfolio_items`
  ADD CONSTRAINT `portfolio_items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `portfolio_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
