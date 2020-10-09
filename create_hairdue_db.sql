-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema hairdue_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema hairdue_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `hairdue_db` DEFAULT CHARACTER SET utf8 ;
USE `hairdue_db` ;

-- -----------------------------------------------------
-- Table `hairdue_db`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hairdue_db`.`user` (
  `user_id` CHAR(16) NOT NULL,
  `user_fname` VARCHAR(20) NULL,
  `user_lname` VARCHAR(20) NULL,
  `user_email` VARCHAR(45) NULL,
  `user_token` VARCHAR(150) NULL,
  `refresh_token` VARCHAR(150) NULL,
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hairdue_db`.`service_provider`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hairdue_db`.`service_provider` (
  `service_provider_id` CHAR(16) NOT NULL,
  `service_provider_name` VARCHAR(45) NULL,
  `sp_location` POINT NULL,
  `sp_address` VARCHAR(45) NULL,
  `sp_whatsapp_contact` VARCHAR(13) NULL,
  `sp_rating` DOUBLE NULL,
  `sp_opening_time` TIME NULL,
  `sp_closing_time` TIME NULL,
  `sp_secondary_contact` VARCHAR(13) NULL,
  `sp_primary_contact` VARCHAR(13) NULL,
  `sp_img_url` VARCHAR(60) NULL,
  PRIMARY KEY (`service_provider_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hairdue_db`.`service_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hairdue_db`.`service_category` (
  `service_category_id` INT NOT NULL,
  `parent_service_category_id` CHAR(16) NULL,
  `service_name` VARCHAR(60) NULL,
  `service_img_url` VARCHAR(60) NULL,
  PRIMARY KEY (`service_category_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hairdue_db`.`service`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hairdue_db`.`service` (
  `service_id` CHAR(16) NOT NULL,
  `service_name` VARCHAR(45) NULL,
  `service_price` DECIMAL(19,6) NULL,
  `service_img_url` VARCHAR(60) NULL,
  `s_service_provider_id` CHAR(16) NULL,
  `s_reviews_count` INT NULL,
  `s_service_type_id` INT NULL,
  PRIMARY KEY (`service_id`),
  INDEX `s_service_provider_id_idx` (`s_service_provider_id` ASC) VISIBLE,
  INDEX `s_service_type_idx` (`s_service_type_id` ASC) VISIBLE,
  CONSTRAINT `s_service_provider_id`
    FOREIGN KEY (`s_service_provider_id`)
    REFERENCES `hairdue_db`.`service_provider` (`service_provider_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `s_service_type_id`
    FOREIGN KEY (`s_service_type_id`)
    REFERENCES `hairdue_db`.`service_category` (`service_category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hairdue_db`.`product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hairdue_db`.`product` (
  `product_id` CHAR(16) NOT NULL,
  `product_name` VARCHAR(45) NULL,
  `product_old_price` DECIMAL(19,6) NULL,
  `product_price` DECIMAL(19,6) NULL,
  `p_img_url` VARCHAR(60) NULL,
  `p_reviews_count` INT NULL,
  `p_service_provider_id` CHAR(16) NULL,
  `p_service_type_id` INT NULL,
  PRIMARY KEY (`product_id`),
  INDEX `p_service_provider_id_idx` (`p_service_provider_id` ASC) VISIBLE,
  INDEX `p_service_type_id_idx` (`p_service_type_id` ASC) VISIBLE,
  CONSTRAINT `p_service_provider_id`
    FOREIGN KEY (`p_service_provider_id`)
    REFERENCES `hairdue_db`.`service_provider` (`service_provider_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `p_service_type_id`
    FOREIGN KEY (`p_service_type_id`)
    REFERENCES `hairdue_db`.`service_category` (`service_category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hairdue_db`.`sp_tag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hairdue_db`.`sp_tag` (
  `sp_tag_id` INT NOT NULL,
  `sp_tag_value` VARCHAR(45) NULL,
  `sp_service_provider_id` CHAR(16) NULL,
  PRIMARY KEY (`sp_tag_id`),
  INDEX `sp_service_provider_id_idx` (`sp_service_provider_id` ASC) VISIBLE,
  CONSTRAINT `sp_service_provider_id`
    FOREIGN KEY (`sp_service_provider_id`)
    REFERENCES `hairdue_db`.`service_provider` (`service_provider_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hairdue_db`.`service_provider_review`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hairdue_db`.`service_provider_review` (
  `sp_review_id` INT NOT NULL,
  `sp_review_content` TEXT(300) NULL,
  `sp_review_rating` DOUBLE NULL,
  `sp_review_provider_id` CHAR(16) NULL,
  `sp_review_userid` CHAR(16) NULL,
  PRIMARY KEY (`sp_review_id`),
  INDEX `sp_review_provider_id_idx` (`sp_review_provider_id` ASC) VISIBLE,
  INDEX `sp_review_userid_idx` (`sp_review_userid` ASC) VISIBLE,
  CONSTRAINT `sp_review_provider_id`
    FOREIGN KEY (`sp_review_provider_id`)
    REFERENCES `hairdue_db`.`service_provider` (`service_provider_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `sp_review_userid`
    FOREIGN KEY (`sp_review_userid`)
    REFERENCES `hairdue_db`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hairdue_db`.`product_review`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hairdue_db`.`product_review` (
  `product_review_id` INT NOT NULL,
  `product_review_content` TEXT(300) NULL,
  `product_review_rating` DOUBLE NULL,
  `product_review_provider_id` CHAR(16) NULL,
  `product_review_userid` CHAR(16) NULL,
  PRIMARY KEY (`product_review_id`),
  INDEX `product_review_provider_id_idx` (`product_review_provider_id` ASC) VISIBLE,
  INDEX `product_review_userid_idx` (`product_review_userid` ASC) VISIBLE,
  CONSTRAINT `product_review_provider_id`
    FOREIGN KEY (`product_review_provider_id`)
    REFERENCES `hairdue_db`.`service_provider` (`service_provider_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `product_review_userid`
    FOREIGN KEY (`product_review_userid`)
    REFERENCES `hairdue_db`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hairdue_db`.`serviceprovider_categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hairdue_db`.`serviceprovider_categories` (
  `service_provider_id` CHAR(16) NULL,
  `service_category_id` INT NULL,
  INDEX `service_provider_id_idx` (`service_provider_id` ASC) VISIBLE,
  INDEX `service_category_id_idx` (`service_category_id` ASC) VISIBLE,
  CONSTRAINT `service_provider_id`
    FOREIGN KEY (`service_provider_id`)
    REFERENCES `hairdue_db`.`service_provider` (`service_provider_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `service_category_id`
    FOREIGN KEY (`service_category_id`)
    REFERENCES `hairdue_db`.`service_category` (`service_category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hairdue_db`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hairdue_db`.`admin` (
  `admin_id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(200) NULL,
  PRIMARY KEY (`admin_id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
