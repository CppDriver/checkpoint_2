namespace MultimediaLibrary.Models
{
    public class User
    {
        public ulong UserId { get; set; }
        public string Username { get; set; } = null!;
        public string Password { get; set; } = null!;
        public string Email { get; set; } = null!;
        public string Salt { get; set; } = null!;
    }
}
