-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-06-08 11:29:31
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `editor_school`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, '管理テスト', 'kanri@kanri.com', NULL, '$2y$10$9aZa7MmvzCHuljwyRxA3ue./qsxv4o1afDzT1.G0UK.nHDxC2qejy', NULL, '2023-06-07 06:11:46', '2023-06-07 06:11:46');

-- --------------------------------------------------------

--
-- テーブルの構造 `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `courses`
--

INSERT INTO `courses` (`id`, `title`, `summary`, `duration`, `image_path`, `created_at`, `updated_at`) VALUES
(9, 'テキスト・タイトルの追加', '動画にテキストやタイトルを追加する方法を学びます。フォントやスタイルの選択、アニメーション効果の設定などを通じてテキスト表示を実現します。', 60, 'images/1685698867.png', '2023-05-29 09:14:33', '2023-06-08 02:26:07'),
(10, '音声操作', '動画の音声を編集し、クリアな音声やバックグラウンドミュージックの追加などを行います。音声トラックの操作やボリューム調整などを学びます。', 60, 'images/1685351723.png', '2023-05-29 09:15:23', '2023-05-30 05:12:44'),
(33, 'カラーグレーディング', '動画の色調を調整し、統一感や特定の雰囲気を演出します。カラーフィルターの適用などを通じてクリエイティブなカラーグレーディングを実現します。', 120, 'images/1685519731.png', '2023-05-31 07:55:31', '2023-05-31 07:55:31'),
(35, 'トランジションの使い方', '動画にエフェクトやトランジションを追加して魅力的な映像を作ります。フェードイン・フェードアウト、モーションエフェクト使い方を探求します。', 180, 'images/1685519813.png', '2023-05-31 07:56:53', '2023-05-31 07:56:53'),
(37, 'クロマキー技術', 'グリーンスクリーン撮影の手法やクロマキー合成の方法を学びます。リアルな映像合成を実現します。', 120, 'images/1685705247.png', '2023-06-02 11:27:27', '2023-06-02 11:27:27'),
(38, 'エクスポート', '完成した動画を適切な形式や解像度でエクスポート・出力する方法を学びます。異なるプラットフォームやデバイスへの出力を学びます。', 120, 'images/1685705360.png', '2023-06-02 11:29:20', '2023-06-02 11:29:20');

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_17_163139_add_columns_to_users_table', 2),
(6, '2023_05_18_170600_create_admins_table', 3),
(7, '2023_05_18_173211_create_admin_password_resets', 4),
(8, '2023_05_29_145323_create_courses_table', 5),
(9, '2023_05_30_181227_create_reservations_table', 6),
(10, '2023_06_07_114424_create_jobs_table', 7);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `reservations`
--

INSERT INTO `reservations` (`id`, `date`, `start_time`, `end_time`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(137, '2023-06-08', '12:00:00', '14:00:00', 13, 33, '2023-06-07 06:12:37', '2023-06-07 06:12:37'),
(138, '2023-06-09', '09:00:00', '10:00:00', 13, 9, '2023-06-07 06:12:44', '2023-06-07 06:12:44'),
(139, '2023-06-13', '10:00:00', '12:00:00', 13, 33, '2023-06-07 06:12:52', '2023-06-07 06:12:52'),
(140, '2023-06-15', '12:00:00', '13:00:00', 13, 10, '2023-06-07 06:12:59', '2023-06-07 06:12:59'),
(141, '2023-06-16', '13:00:00', '14:00:00', 13, 10, '2023-06-07 06:13:23', '2023-06-07 06:13:23'),
(142, '2023-06-06', '15:00:00', '16:00:00', 13, 10, '2023-06-07 06:13:35', '2023-06-07 06:13:35'),
(145, '2023-06-14', '12:00:00', '15:00:00', 11, 35, '2023-06-07 06:14:20', '2023-06-07 06:14:20'),
(146, '2023-06-20', '11:00:00', '13:00:00', 11, 33, '2023-06-07 06:14:32', '2023-06-07 06:14:32'),
(147, '2023-06-22', '09:00:00', '10:00:00', 11, 9, '2023-06-07 06:14:39', '2023-06-07 06:14:39'),
(148, '2023-06-08', '14:00:00', '15:00:00', 12, 10, '2023-06-07 06:16:13', '2023-06-07 06:16:13'),
(150, '2023-06-19', '13:00:00', '14:00:00', 12, 10, '2023-06-07 06:16:35', '2023-06-07 06:16:35'),
(151, '2023-06-26', '09:00:00', '10:00:00', 12, 9, '2023-06-07 06:16:49', '2023-06-07 06:16:49'),
(156, '2023-06-09', '10:00:00', '11:00:00', 11, 10, '2023-06-07 09:47:15', '2023-06-07 09:47:15'),
(157, '2023-06-09', '13:00:00', '15:00:00', 11, 33, '2023-06-08 02:17:46', '2023-06-08 02:17:46');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `google_id`, `age`) VALUES
(11, '山田太郎', 'yamada@yamada.com', NULL, '$2y$10$I86KD2d2e.xodPucfNzgSOZzfwRzAg5Lpp3bNSYrVKrjQfcJabEA2', NULL, '2023-06-07 05:53:45', '2023-06-07 05:53:45', NULL, NULL),
(12, '鈴木一郎', 'suzuki@suzuki.com', NULL, '$2y$10$NqUzbBeRmLCNhC69Hc7NXuykL.ZWoNEB8XIAwdSqPTxdgSRD4aKP.', NULL, '2023-06-07 06:02:59', '2023-06-07 06:02:59', NULL, NULL),
(13, '伊藤健太', 'ito@ito.com', NULL, '$2y$10$CSAQs2JY/7Cy4VFBgUdvSeM.99ovmw7NmSqgAkvtvwMnhJeymFETS', NULL, '2023-06-07 06:04:12', '2023-06-07 06:04:12', NULL, NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- テーブルのインデックス `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`email`);

--
-- テーブルのインデックス `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`),
  ADD KEY `reservations_course_id_foreign` (`course_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_google_id_unique` (`google_id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- テーブルの AUTO_INCREMENT `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
