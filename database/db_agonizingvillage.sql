-- MySQL Script generated by MySQL Workbench
-- Wed Dec  4 01:20:27 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema db_agonizingvillage
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_agonizingvillage
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_agonizingvillage` ;
USE `db_agonizingvillage` ;

-- -----------------------------------------------------
-- Table `db_agonizingvillage`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_agonizingvillage`.`users` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `u_email` VARCHAR(100) NULL DEFAULT NULL,
  `u_user` VARCHAR(100) NULL DEFAULT NULL,
  `u_pass` CHAR(32) NULL DEFAULT NULL,
  `u_type` INT NULL DEFAULT 1,
  UNIQUE INDEX (`u_email` ASC) VISIBLE,
  UNIQUE INDEX (`u_user` ASC) VISIBLE,
  PRIMARY KEY (`id_user`));


-- -----------------------------------------------------
-- Table `db_agonizingvillage`.`inventory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_agonizingvillage`.`inventory` (
  `id_invent` INT NOT NULL AUTO_INCREMENT,
  `i_description` VARCHAR(20) NULL DEFAULT NULL,
  `i_status` INT NULL DEFAULT NULL,
  `i_quantity` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id_invent`));


-- -----------------------------------------------------
-- Table `db_agonizingvillage`.`player`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_agonizingvillage`.`player` (
  `id_player` INT NOT NULL AUTO_INCREMENT,
  `p_name` VARCHAR(20) NOT NULL DEFAULT 'Geraldo',
  `p_hp` INT NULL DEFAULT NULL,
  `p_level` INT NULL DEFAULT NULL,
  `p_mana` INT NULL DEFAULT NULL,
  `p_attack` INT NULL DEFAULT NULL,
  `p_defense` INT NULL DEFAULT NULL,
  `p_spell` INT NULL DEFAULT NULL,
  `inventory_id_invent` INT NOT NULL,
  `users_id_user` INT NOT NULL,
  PRIMARY KEY (`id_player`),
  INDEX `fk_player_inventory1_idx` (`inventory_id_invent` ASC) VISIBLE,
  INDEX `fk_player_users1_idx` (`users_id_user` ASC) VISIBLE,
  CONSTRAINT `fk_player_inventory1`
    FOREIGN KEY (`inventory_id_invent`)
    REFERENCES `db_agonizingvillage`.`inventory` (`id_invent`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_player_users1`
    FOREIGN KEY (`users_id_user`)
    REFERENCES `db_agonizingvillage`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `db_agonizingvillage`.`monsters`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_agonizingvillage`.`monsters` (
  `id_monster` INT NOT NULL AUTO_INCREMENT,
  `m_name` VARCHAR(20) NULL DEFAULT NULL,
  `m_level` INT NULL DEFAULT NULL,
  `m_hp` INT NULL DEFAULT NULL,
  `m_defense` INT NULL DEFAULT NULL,
  `m_attack` INT NULL DEFAULT NULL,
  `player_id_player` INT NOT NULL,
  PRIMARY KEY (`id_monster`),
  INDEX `fk_monsters_player_idx` (`player_id_player` ASC) VISIBLE,
  CONSTRAINT `fk_monsters_player`
    FOREIGN KEY (`player_id_player`)
    REFERENCES `db_agonizingvillage`.`player` (`id_player`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
    
   -- Monstros Level 1 ao 5 
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Morc",1,10,1,2,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Crieg",2,15,2,3,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Zabbu",3,20,3,4,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Bell",4,20,4,5,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Raqki",5,25,5,6,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Ettercap",1,10,1,2,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Ankheg",2,15,2,3,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Yutri",3,20,3,4,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Zarathan",4,20,4,5,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Atrop",4,20,4,5,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Greel",5,25,5,6,1);

-- Monstros Level 6 ao 10
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Super Morc",6,40,6,7,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Super Crieg",7,45,6,8,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Super Zabbu",8,50,6,8,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Super Bell",9,60,6,9,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Super Raqki",10,80,6,10,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Super Ettercap",6,40,6,7,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Super Ankheg",7,45,6,8,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Super Yutri",8,50,6,8,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Super Zarathan",9,60,6,9,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Super Atrop",9,60,6,9,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Super Greel",10,80,6,10,1);

-- Monstros Level 11 ao 20
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Mega Morc",11,90,7,11,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Mega Crieg",12,100,8,12,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Mega Zabbu",13,110,9,13,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Mega Bell",14,120,7,14,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Mega Raqki",15,130,8,15,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Mega Ettercap",16,140,9,16,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Mega Ankheg",17,150,7,17,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Mega Yutri",18,160,8,18,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Mega Zarathan",19,170,9,19,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Mega Atrop",20,180,8,20,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Mega Greel",20,190,9,20,1);

-- Monstros Level 21 ao 30
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Ultimate Morc",21,200,10,22,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Ultimate Crieg",22,210,11,24,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Ultimate Zabbu",23,220,12,26,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Ultimate Bell",24,230,13,28,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Ultimate Raqki",25,240,14,30,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Ultimate Ettercap",26,250,15,32,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Ultimate Ankheg",27,260,16,34,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Ultimate Yutri",28,270,17,36,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Ultimate Zarathan",29,280,18,38,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Ultimate Atrop",30,290,19,40,1);
INSERT INTO monsters (m_name,m_level,m_hp,m_defense,m_attack,player_id_player) VALUES ("Ultimate Greel",30,290,19,40,1);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

