<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230929202940 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E43A76ED395 FOREIGN KEY (user_id) REFERENCES usuarios (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E435FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_39986E43A76ED395 ON album (user_id)');
        $this->addSql('CREATE INDEX IDX_39986E435FB14BA7 ON album (level_id)');
        $this->addSql('ALTER TABLE amigos ADD CONSTRAINT FK_3317FC62F624B39D FOREIGN KEY (sender_id) REFERENCES usuarios (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE amigos ADD CONSTRAINT FK_3317FC62386D8D01 FOREIGN KEY (receptor_id) REFERENCES usuarios (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_3317FC62F624B39D ON amigos (sender_id)');
        $this->addSql('CREATE INDEX IDX_3317FC62386D8D01 ON amigos (receptor_id)');
        $this->addSql('ALTER TABLE comentarios ADD CONSTRAINT FK_F54B3FC0A76ED395 FOREIGN KEY (user_id) REFERENCES usuarios (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE comentarios ADD CONSTRAINT FK_F54B3FC04E3EE1A1 FOREIGN KEY (comentarios_id) REFERENCES comentarios (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F54B3FC0A76ED395 ON comentarios (user_id)');
        $this->addSql('CREATE INDEX IDX_F54B3FC04E3EE1A1 ON comentarios (comentarios_id)');
        $this->addSql('ALTER TABLE conversaciones ADD CONSTRAINT FK_D33DD86EF624B39D FOREIGN KEY (sender_id) REFERENCES usuarios (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE conversaciones ADD CONSTRAINT FK_D33DD86E386D8D01 FOREIGN KEY (receptor_id) REFERENCES usuarios (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_D33DD86EF624B39D ON conversaciones (sender_id)');
        $this->addSql('CREATE INDEX IDX_D33DD86E386D8D01 ON conversaciones (receptor_id)');
        $this->addSql('ALTER TABLE corazon ADD CONSTRAINT FK_CF11C1F1A76ED395 FOREIGN KEY (user_id) REFERENCES usuarios (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_CF11C1F1A76ED395 ON corazon (user_id)');
        $this->addSql('ALTER TABLE equipo ADD CONSTRAINT FK_C49C530BA76ED395 FOREIGN KEY (user_id) REFERENCES usuarios (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C49C530BA76ED395 ON equipo (user_id)');
        $this->addSql('ALTER TABLE imagen ADD CONSTRAINT FK_8319D2B31137ABCF FOREIGN KEY (album_id) REFERENCES album (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE imagen ADD CONSTRAINT FK_8319D2B3A76ED395 FOREIGN KEY (user_id) REFERENCES usuarios (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE imagen ADD CONSTRAINT FK_8319D2B35FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_8319D2B31137ABCF ON imagen (album_id)');
        $this->addSql('CREATE INDEX IDX_8319D2B3A76ED395 ON imagen (user_id)');
        $this->addSql('CREATE INDEX IDX_8319D2B35FB14BA7 ON imagen (level_id)');
        $this->addSql('ALTER TABLE mensajes ADD CONSTRAINT FK_6C929C80A76ED395 FOREIGN KEY (user_id) REFERENCES usuarios (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mensajes ADD CONSTRAINT FK_6C929C80ABD5A1D6 FOREIGN KEY (conversacion_id) REFERENCES conversaciones (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_6C929C80A76ED395 ON mensajes (user_id)');
        $this->addSql('CREATE INDEX IDX_6C929C80ABD5A1D6 ON mensajes (conversacion_id)');
        $this->addSql('ALTER TABLE notificaciones ADD CONSTRAINT FK_6FFCB21F624B39D FOREIGN KEY (sender_id) REFERENCES usuarios (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE notificaciones ADD CONSTRAINT FK_6FFCB21386D8D01 FOREIGN KEY (receptor_id) REFERENCES usuarios (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_6FFCB21F624B39D ON notificaciones (sender_id)');
        $this->addSql('CREATE INDEX IDX_6FFCB21386D8D01 ON notificaciones (receptor_id)');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8D5FB14BA7 FOREIGN KEY (level_id) REFERENCES level (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_5A8A6C8D5FB14BA7 ON post (level_id)');
        $this->addSql('ALTER TABLE post_image ADD CONSTRAINT FK_522688B04B89032C FOREIGN KEY (post_id) REFERENCES post (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE post_image ADD CONSTRAINT FK_522688B03DA5256D FOREIGN KEY (image_id) REFERENCES imagen (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_522688B04B89032C ON post_image (post_id)');
        $this->addSql('CREATE INDEX IDX_522688B03DA5256D ON post_image (image_id)');
        $this->addSql('ALTER TABLE usuarios ALTER activo DROP NOT NULL');
        $this->addSql('ALTER TABLE usuarios ALTER admin DROP NOT NULL');
        $this->addSql('ALTER TABLE usuarios ALTER created_ad DROP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE imagen DROP CONSTRAINT FK_8319D2B31137ABCF');
        $this->addSql('ALTER TABLE imagen DROP CONSTRAINT FK_8319D2B3A76ED395');
        $this->addSql('ALTER TABLE imagen DROP CONSTRAINT FK_8319D2B35FB14BA7');
        $this->addSql('DROP INDEX IDX_8319D2B31137ABCF');
        $this->addSql('DROP INDEX IDX_8319D2B3A76ED395');
        $this->addSql('DROP INDEX IDX_8319D2B35FB14BA7');
        $this->addSql('ALTER TABLE conversaciones DROP CONSTRAINT FK_D33DD86EF624B39D');
        $this->addSql('ALTER TABLE conversaciones DROP CONSTRAINT FK_D33DD86E386D8D01');
        $this->addSql('DROP INDEX IDX_D33DD86EF624B39D');
        $this->addSql('DROP INDEX IDX_D33DD86E386D8D01');
        $this->addSql('ALTER TABLE usuarios ALTER activo DROP NOT NULL');
        $this->addSql('ALTER TABLE usuarios ALTER admin DROP NOT NULL');
        $this->addSql('ALTER TABLE usuarios ALTER created_ad DROP NOT NULL');
        $this->addSql('ALTER TABLE notificaciones DROP CONSTRAINT FK_6FFCB21F624B39D');
        $this->addSql('ALTER TABLE notificaciones DROP CONSTRAINT FK_6FFCB21386D8D01');
        $this->addSql('DROP INDEX IDX_6FFCB21F624B39D');
        $this->addSql('DROP INDEX IDX_6FFCB21386D8D01');
        $this->addSql('ALTER TABLE comentarios DROP CONSTRAINT FK_F54B3FC0A76ED395');
        $this->addSql('ALTER TABLE comentarios DROP CONSTRAINT FK_F54B3FC04E3EE1A1');
        $this->addSql('DROP INDEX IDX_F54B3FC0A76ED395');
        $this->addSql('DROP INDEX IDX_F54B3FC04E3EE1A1');
        $this->addSql('ALTER TABLE post_image DROP CONSTRAINT FK_522688B04B89032C');
        $this->addSql('ALTER TABLE post_image DROP CONSTRAINT FK_522688B03DA5256D');
        $this->addSql('DROP INDEX IDX_522688B04B89032C');
        $this->addSql('DROP INDEX IDX_522688B03DA5256D');
        $this->addSql('ALTER TABLE amigos DROP CONSTRAINT FK_3317FC62F624B39D');
        $this->addSql('ALTER TABLE amigos DROP CONSTRAINT FK_3317FC62386D8D01');
        $this->addSql('DROP INDEX IDX_3317FC62F624B39D');
        $this->addSql('DROP INDEX IDX_3317FC62386D8D01');
        $this->addSql('ALTER TABLE equipo DROP CONSTRAINT FK_C49C530BA76ED395');
        $this->addSql('DROP INDEX IDX_C49C530BA76ED395');
        $this->addSql('ALTER TABLE mensajes DROP CONSTRAINT FK_6C929C80A76ED395');
        $this->addSql('ALTER TABLE mensajes DROP CONSTRAINT FK_6C929C80ABD5A1D6');
        $this->addSql('DROP INDEX IDX_6C929C80A76ED395');
        $this->addSql('DROP INDEX IDX_6C929C80ABD5A1D6');
        $this->addSql('ALTER TABLE post DROP CONSTRAINT FK_5A8A6C8D5FB14BA7');
        $this->addSql('DROP INDEX IDX_5A8A6C8D5FB14BA7');
        $this->addSql('ALTER TABLE album DROP CONSTRAINT FK_39986E43A76ED395');
        $this->addSql('ALTER TABLE album DROP CONSTRAINT FK_39986E435FB14BA7');
        $this->addSql('DROP INDEX IDX_39986E43A76ED395');
        $this->addSql('DROP INDEX IDX_39986E435FB14BA7');
        $this->addSql('ALTER TABLE corazon DROP CONSTRAINT FK_CF11C1F1A76ED395');
        $this->addSql('DROP INDEX IDX_CF11C1F1A76ED395');
    }
}
