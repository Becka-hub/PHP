DROP DATABASE IF EXISTS gestionmembre;

CREATE DATABASE IF NOT EXISTS gestionmembre;
USE gestionmembre;
# -----------------------------------------------------------------------------
#       TABLE : MEMBRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS MEMBRE
 (
   IDM INTEGER NOT NULL AUTO_INCREMENT  ,
   NOM VARCHAR(128) NULL  ,
   DATENAISSANCE DATE NULL  ,
   EMAIL VARCHAR(128) NULL  ,
   MOTPASSE VARCHAR(128) NULL  
   , PRIMARY KEY (IDM) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PUBLICATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PUBLICATION
 (
   IDP INTEGER NOT NULL AUTO_INCREMENT ,
   IDM INTEGER NOT NULL  ,
   CONTENU VARCHAR(1027) NULL  ,
   DATEPUBLICATION DATE NULL  
   , PRIMARY KEY (IDP) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PUBLICATION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PUBLICATION_MEMBRE
     ON PUBLICATION (IDM ASC);

# -----------------------------------------------------------------------------
#       TABLE : REPONDRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS REPONDRE
 (
	IDR INTEGER NOT NULL AUTO_INCREMENT,
   IDM INTEGER NOT NULL  ,
   IDP INTEGER NOT NULL  ,
   REPONSE VARCHAR(1027) NULL  
   , PRIMARY KEY (IDR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE REPONDRE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_REPONDRE_MEMBRE
     ON REPONDRE (IDM ASC);

CREATE  INDEX I_FK_REPONDRE_PUBLICATION
     ON REPONDRE (IDP ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE PUBLICATION 
  ADD FOREIGN KEY FK_PUBLICATION_MEMBRE (IDM)
      REFERENCES MEMBRE (IDM) ;


ALTER TABLE REPONDRE 
  ADD FOREIGN KEY FK_REPONDRE_MEMBRE (IDM)
      REFERENCES MEMBRE (IDM) ;


ALTER TABLE REPONDRE 
  ADD FOREIGN KEY FK_REPONDRE_PUBLICATION (IDP)
      REFERENCES PUBLICATION (IDP) ;

