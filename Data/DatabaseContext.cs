using Microsoft.EntityFrameworkCore;
using MultimediaLibrary.Models;

namespace MultimediaLibrary.Data
{
    public class DatabaseContext : DbContext
    {
        public DbSet<User> Users { get; set; } = null!;
        public DbSet<Gallery> Galleries { get; set; } = null!;
        public DbSet<Media> Media { get; set; } = null!;
        public DbSet<Comment> Comments { get; set; } = null!;

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            optionsBuilder.UseSqlServer(@"server=localhost\sqlexpress;database=MultimediaLibrary;TrustServerCertificate=True;Integrated Security=True;");
        }
    }
}
