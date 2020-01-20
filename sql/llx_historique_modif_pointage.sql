CREATE TABLE `llx_historique_modif_pointage` ( 
 `rowid` INT(11) NOT NULL AUTO_INCREMENT ,
 `fk_pointage` INT NOT NULL ,
 `fk_user` INT NOT NULL ,
 `champ_modifiee` TEXT NOT NULL ,
 `etat` CHAR(1) NOT NULL ,
 `motif` TEXT NOT NULL ,
 `cree_le` DATETIME NOT NULL ,
  PRIMARY KEY (`rowid`)
) ENGINE = InnoDB;