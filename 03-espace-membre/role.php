<?php

declare(strict_types=1);

enum Role: string
{
  case ADMIN = 'admin';
  case USER = 'user';

  /**
   * Retourne le libellé lisible du rôle (ex: "Administrateur")
   */
  public function label(): string
  {
    return match ($this) {
      self::ADMIN => 'Administrateur',
      self::USER => 'Utilisateur',
    };
  }

  /**
   * Vérifie si le rôle actuel est celui d'un administrateur
   */
  public function isAdmin(): bool
  {
    return $this === self::ADMIN;
  }
}
