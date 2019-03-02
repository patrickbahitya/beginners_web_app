SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `registrationexamination_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `registrationexamination_db` ;

-- -----------------------------------------------------
-- Table `registrationexamination_db`.`tbl_admin`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `registrationexamination_db`.`tbl_admin` (
  `admin_id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(15) NULL ,
  PRIMARY KEY (`admin_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registrationexamination_db`.`tbl_user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `registrationexamination_db`.`tbl_user` (
  `user_id` INT NOT NULL AUTO_INCREMENT ,
  `namee` VARCHAR(15) NULL ,
  `user_name` VARCHAR(15) NULL ,
  `password` VARCHAR(15) NULL ,
  PRIMARY KEY (`user_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registrationexamination_db`.`tbl_student`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `registrationexamination_db`.`tbl_student` (
  `reg_no` INT NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(15) NULL ,
  `surname` VARCHAR(15) NULL ,
  `sex` VARCHAR(15) NULL ,
  `district` VARCHAR(15) NULL ,
  `telephone` VARCHAR(20) NULL ,
  PRIMARY KEY (`reg_no`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registrationexamination_db`.`tbl_sponsorshipScheme`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `registrationexamination_db`.`tbl_sponsorshipScheme` (
  `sponsorshipScheme_id` INT NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(45) NULL ,
  PRIMARY KEY (`sponsorshipScheme_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registrationexamination_db`.`tbl_entryScheme`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `registrationexamination_db`.`tbl_entryScheme` (
  `entryScheme_id` INT NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(45) NULL ,
  PRIMARY KEY (`entryScheme_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registrationexamination_db`.`tbl_course`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `registrationexamination_db`.`tbl_course` (
  `course_code` INT NOT NULL AUTO_INCREMENT ,
  `course_name` VARCHAR(15) NULL ,
  PRIMARY KEY (`course_code`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registrationexamination_db`.`tbl_courseUnit`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `registrationexamination_db`.`tbl_courseUnit` (
  `courseUnitCode_id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(15) NULL ,
  `course_code` INT NOT NULL ,
  PRIMARY KEY (`courseUnitCode_id`, `course_code`) ,
  INDEX `fk_tbl_courseUnit_tbl_course1` (`course_code` ASC) ,
  CONSTRAINT `fk_tbl_courseUnit_tbl_course1`
    FOREIGN KEY (`course_code` )
    REFERENCES `registrationexamination_db`.`tbl_course` (`course_code` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registrationexamination_db`.`tbl_department`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `registrationexamination_db`.`tbl_department` (
  `department_id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(15) NULL ,
  `hod` VARCHAR(15) NULL ,
  PRIMARY KEY (`department_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registrationexamination_db`.`tbl_transcript`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `registrationexamination_db`.`tbl_transcript` (
  `transcript_id` INT NOT NULL AUTO_INCREMENT ,
  `transcript_no` VARCHAR(15) NULL ,
  `type` VARCHAR(15) NULL ,
  `department_id` INT NOT NULL ,
  PRIMARY KEY (`transcript_id`, `department_id`) ,
  INDEX `fk_tbl_transcript_tbl_department1` (`department_id` ASC) ,
  CONSTRAINT `fk_tbl_transcript_tbl_department1`
    FOREIGN KEY (`department_id` )
    REFERENCES `registrationexamination_db`.`tbl_department` (`department_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registrationexamination_db`.`tbl_assessment`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `registrationexamination_db`.`tbl_assessment` (
  `assessment_id` INT NOT NULL AUTO_INCREMENT ,
  `type` VARCHAR(15) NULL ,
  `marks` INT NULL ,
  `reg_no` INT NOT NULL ,
  PRIMARY KEY (`assessment_id`, `reg_no`) ,
  INDEX `fk_tbl_assessment_tbl_student1` (`reg_no` ASC) ,
  CONSTRAINT `fk_tbl_assessment_tbl_student1`
    FOREIGN KEY (`reg_no` )
    REFERENCES `registrationexamination_db`.`tbl_student` (`reg_no` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registrationexamination_db`.`tbl_semester`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `registrationexamination_db`.`tbl_semester` (
  `semester_id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(15) NULL ,
  `year` VARCHAR(15) NULL ,
  PRIMARY KEY (`semester_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registrationexamination_db`.`tbl_lecturer`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `registrationexamination_db`.`tbl_lecturer` (
  `lecturer_id` INT NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(15) NULL ,
  `surname` VARCHAR(15) NULL ,
  PRIMARY KEY (`lecturer_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registrationexamination_db`.`tbl_lecturer_courseUnit`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `registrationexamination_db`.`tbl_lecturer_courseUnit` (
  `lecturer_courseUnit_id` INT NOT NULL AUTO_INCREMENT ,
  `lecturer_id` INT NOT NULL ,
  `courseUnitCode_id` INT NOT NULL ,
  PRIMARY KEY (`lecturer_courseUnit_id`, `lecturer_id`, `courseUnitCode_id`) ,
  INDEX `fk_tbl_lecturer_has_tbl_courseUnit_tbl_courseUnit1` (`courseUnitCode_id` ASC) ,
  INDEX `fk_tbl_lecturer_has_tbl_courseUnit_tbl_lecturer1` (`lecturer_id` ASC) ,
  CONSTRAINT `fk_tbl_lecturer_has_tbl_courseUnit_tbl_lecturer1`
    FOREIGN KEY (`lecturer_id` )
    REFERENCES `registrationexamination_db`.`tbl_lecturer` (`lecturer_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_lecturer_has_tbl_courseUnit_tbl_courseUnit1`
    FOREIGN KEY (`courseUnitCode_id` )
    REFERENCES `registrationexamination_db`.`tbl_courseUnit` (`courseUnitCode_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `registrationexamination_db`.`tbl_hod`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `registrationexamination_db`.`tbl_hod` (
  `hod_id` INT NOT NULL AUTO_INCREMENT ,
  `first_name` VARCHAR(15) NULL ,
  `surname` VARCHAR(15) NULL ,
  PRIMARY KEY (`hod_id`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
