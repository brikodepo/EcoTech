import mysql.connector

# A faire avant / pip install mysql-connector-python

# Connexion à la base de données MySQL
conn = mysql.connector.connect(
    host='localhost',
    user='votre_utilisateur',
    password='votre_mot_de_passe',
    database='votre_base_de_donnees'
)