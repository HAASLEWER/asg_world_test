# Shell script for creating database and tables
# usage bash db_primer.sh

echo "Please specify mysql host:"
read host
echo "Please specify mysql username:"
read username

mysql -h $host -u $username -p contact_manager < db_primer.sql