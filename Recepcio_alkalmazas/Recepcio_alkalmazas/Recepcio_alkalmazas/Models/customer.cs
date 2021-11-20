using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Configuration;
using System.Text;

namespace Recepcio_alkalmazas.Models
{
    public class customer
    {
        public int CustomerID { get; set; }
        public string Name { get; set; }
        public string PhoneNumber { get; set; }
        public string IDNumber { get; set; }
        public customer(){ }
        public customer(MySqlDataReader reader)
        {

        }
    }
}
