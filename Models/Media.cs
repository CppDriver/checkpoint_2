namespace MultimediaLibrary.Models
{
    public class Media
    {
        public ulong MediaId { get; set; }
        public ulong UserId { get; set; }
        public string Title { get; set; } = null!;
        public string? Description { get; set; }
        public string Url { get; set; } = null!;
        public DateTime DateCreated { get; set; }
        public DateTime DateUpdated { get; set; }
        public long Size { get; set; }
        public bool DownloadAllow;

        public User User { get; set; } = null!;
    }
}
