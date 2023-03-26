SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema my_schema
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `my_schema` ;

-- -----------------------------------------------------
-- Schema my_schema
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `my_schema` DEFAULT CHARACTER SET utf8 ;
USE `my_schema` ;

-- -----------------------------------------------------
-- Table `my_schema`.`my_table`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `my_schema`.`my_table` ;

CREATE TABLE IF NOT EXISTS `my_schema`.`my_table` (
  `id` VARCHAR(10) NOT NULL,
  `terminal` TINYINT NOT NULL,
  `gate` INT UNSIGNED NOT NULL,
  `aircraft` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`, `aircraft`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO my_table(id,terminal,gate,aircraft) VALUES('AA1111','3',5,'aircraft1');
INSERT INTO my_table(id,terminal,gate,aircraft) VALUES('BB2222','3',5,'aircraft2');
INSERT INTO my_table(id,terminal,gate,aircraft) VALUES('CC3333','3',5,'aircraft3');
INSERT INTO my_table(id,terminal,gate,aircraft) VALUES('DD4444','3',65,'aircraft4');