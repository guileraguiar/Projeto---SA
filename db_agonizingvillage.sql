/*Banco de dados inicial.
Autoria: Steel Freak INC.*/
-- drop database db_agonizingVillage;
create database db_agonizingvillage;
use db_agonizingvillage;

CREATE TABLE users (
    u_email VARCHAR(100) unique key,
    u_user VARCHAR(100) unique key,
    u_pass char(32),
    id_user INTEGER PRIMARY KEY auto_increment
);    
    
CREATE TABLE race (
    r_elf VARCHAR(100),
    r_orc VARCHAR(100),
    r_mage VARCHAR(100),
    r_human VARCHAR(100),
    id_race INTEGER PRIMARY KEY auto_increment
    
);

    
CREATE TABLE equip (
    e_armor INTEGER,
    e_attack INTEGER,
    e_life INTEGER,
    e_energy INTEGER,
    e_price INTEGER,
    e_crit_chance INTEGER,
    id_equip INTEGER PRIMARY KEY
);

CREATE TABLE type_equip (
    tp_elm VARCHAR(100),
    tp_grebas VARCHAR(100),
    tp_boots VARCHAR(100),
    tp_armor VARCHAR(100),
    tp_potion VARCHAR(100),
    id_type VARCHAR(10) PRIMARY KEY
);


CREATE TABLE duel (
    id_duel INTEGER PRIMARY KEY UNIQUE,
    d_date DATE,
    fk_user_enemy INTEGER,
    d_enemy VARCHAR(100),
    d_result INTEGER
);
 
ALTER TABLE duel ADD CONSTRAINT fk_user_enemy
    FOREIGN KEY (fk_user_enemy)
    REFERENCES users (id_user);

CREATE TABLE characters (
    c_nickname VARCHAR(20) PRIMARY KEY UNIQUE,
    fk_race INTEGER,
    c_experience INTEGER,
    c_life VARCHAR(100),
    c_energy VARCHAR(100),
    c_strenght VARCHAR(100),
    c_defense VARCHAR(100),
    c_inventory VARCHAR(100),
    c_level VARCHAR(100),
    c_ability VARCHAR(100),
    c_crit_chance VARCHAR(100),
    c_money VARCHAR(100)
);

ALTER TABLE characters ADD CONSTRAINT fk_race
    FOREIGN KEY (fk_race)
    REFERENCES race (id_race);