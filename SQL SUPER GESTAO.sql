-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema sg
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sg
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sg` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ;
USE `sg` ;

-- -----------------------------------------------------
-- Table `sg`.`failed_jobs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sg`.`failed_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` VARCHAR(255) NOT NULL,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `exception` LONGTEXT NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `failed_jobs_uuid_unique` (`uuid` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sg`.`filiais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sg`.`filiais` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `filial` VARCHAR(30) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sg`.`fornecedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sg`.`fornecedores` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `site` VARCHAR(150) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `uf` VARCHAR(2) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sg`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sg`.`migrations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 18
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sg`.`password_resets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sg`.`password_resets` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `password_resets_email_index` (`email` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sg`.`personal_access_tokens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sg`.`personal_access_tokens` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` VARCHAR(255) NOT NULL,
  `tokenable_id` BIGINT UNSIGNED NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `token` VARCHAR(64) NOT NULL,
  `abilities` TEXT NULL DEFAULT NULL,
  `last_used_at` TIMESTAMP NULL DEFAULT NULL,
  `expires_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `personal_access_tokens_token_unique` (`token` ASC) VISIBLE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type` ASC, `tokenable_id` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sg`.`unidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sg`.`unidades` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `unidade` VARCHAR(5) NOT NULL,
  `descricao` VARCHAR(30) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sg`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sg`.`produtos` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `descricao` TEXT NULL DEFAULT NULL,
  `peso` INT NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `unidade_id` BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `produtos_unidade_id_foreign` (`unidade_id` ASC) VISIBLE,
  CONSTRAINT `produtos_unidade_id_foreign`
    FOREIGN KEY (`unidade_id`)
    REFERENCES `sg`.`unidades` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sg`.`produto_detalhes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sg`.`produto_detalhes` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `produto_id` BIGINT UNSIGNED NOT NULL,
  `comprimento` DOUBLE(8,2) NOT NULL,
  `largura` DOUBLE(8,2) NOT NULL,
  `altura` DOUBLE(8,2) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `unidade_id` BIGINT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `produto_detalhes_produto_id_unique` (`produto_id` ASC) VISIBLE,
  INDEX `produto_detalhes_unidade_id_foreign` (`unidade_id` ASC) VISIBLE,
  CONSTRAINT `produto_detalhes_produto_id_foreign`
    FOREIGN KEY (`produto_id`)
    REFERENCES `sg`.`produtos` (`id`),
  CONSTRAINT `produto_detalhes_unidade_id_foreign`
    FOREIGN KEY (`unidade_id`)
    REFERENCES `sg`.`unidades` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sg`.`produto_filiais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sg`.`produto_filiais` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `filial_id` BIGINT UNSIGNED NOT NULL,
  `produto_id` BIGINT UNSIGNED NOT NULL,
  `preco_venda` DECIMAL(8,2) NOT NULL,
  `estoque_minimo` INT NOT NULL,
  `estoque_maximo` INT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `produto_filiais_filial_id_foreign` (`filial_id` ASC) VISIBLE,
  INDEX `produto_filiais_produto_id_foreign` (`produto_id` ASC) VISIBLE,
  CONSTRAINT `produto_filiais_filial_id_foreign`
    FOREIGN KEY (`filial_id`)
    REFERENCES `sg`.`filiais` (`id`),
  CONSTRAINT `produto_filiais_produto_id_foreign`
    FOREIGN KEY (`produto_id`)
    REFERENCES `sg`.`produtos` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sg`.`site_contatos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sg`.`site_contatos` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `telefone` VARCHAR(20) NOT NULL,
  `email` VARCHAR(80) NOT NULL,
  `motivo_contato` INT NOT NULL,
  `mensagem` TEXT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `sg`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sg`.`users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `users_email_unique` (`email` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
