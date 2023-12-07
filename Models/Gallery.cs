using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;

namespace MultimediaLibrary.Models
{
    public class Gallery
    {
        public ulong GalleryId { get; set; }
        public ulong UserId { get; set; }
        public string Title { get; set; } = null!;
        public string? Description { get; set; }
        public string DateCreated { get; set; } = null!;

        public User User { get; set; } = null!;
    }
}
